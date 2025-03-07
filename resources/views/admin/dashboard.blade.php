<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard-customer</title>
    <!-- Add Chart.js from CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
</head>


@extends('layouts.app')
@section('content')

    <body>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>แอดมิน</h1>
            <button onclick="window.location.href='{{ route('add.employee') }}'" class="btn btn-success">เพิ่มพนักงาน</button>
        </div>

        <!-- Add chart container -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-white">
                        <h4 class="mb-0">สถิติการซ่อม</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="repairChart" width="400" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-white">
                        <h4 class="mb-0">สรุปสถานะการซ่อม</h4>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-6 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h3 class="text-primary">{{ $total_repair }}</h3>
                                        <p class="mb-0">งานทั้งหมด</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h3 class="text-success">{{ $done_repair }}</h3>
                                        <p class="mb-0">งานที่เสร็จสิ้น</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h3 class="text-warning">{{ $total_repair - $done_repair }}</h3>
                                        <p class="mb-0">งานที่รอดำเนินการ</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h3 class="text-info">
                                            {{ number_format(($done_repair / ($total_repair > 0 ? $total_repair : 1)) * 100, 1) }}%
                                        </h3>
                                        <p class="mb-0">อัตราความสำเร็จ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <h3>รายละเอียด/ปัญหาของลูกค้า</h3>
            @if ($repair->isEmpty())
                <p>No repair requests found.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">เลขที่แจ้งซ่อม</th>
                            <th scope="col">ปัญหา</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">วันที่แจ้งซ่อม</th>
                            <th scope="col">วันที่อัพเดท</th>
                            <th scope="col">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($repair as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->repair_detail }}</td>
                                <td>
                                    @if ($item->status == 'progress')
                                        <span class="badge bg-warning text-dark">กำลังดำเนินงาน</span>
                                    @elseif($item->status == 'done')
                                        <span class="badge bg-success">สำเร็จ</span>
                                    @else
                                        <span class="badge bg-secondary">รอดำเนินการ</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $item->updated_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    @if ($item->status == 'progress')
                                        <button type="button" class="btn btn-primary btn-sm"
                                            disabled>พนักงานกำลังทำงาน</button>
                                    @elseif($item->status == 'done')
                                        <button type="button" class="btn btn-success btn-sm" disabled>สำเร็จ</button>
                                    @else
                                        <form action="{{ route('select.emp', $item->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-warning btn-sm">เลือกพนักงาน</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- JavaScript for Chart -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('repairChart').getContext('2d');

                // Get data from PHP variables
                const totalRepair = {{ $total_repair }};
                const doneRepair = {{ $done_repair }};
                const pendingRepair = totalRepair - doneRepair;

                // Count status types (you may need to modify this based on your actual data)
                let progressCount = 0;
                let waitingCount = 0;

                @foreach ($repair as $item)
                    @if ($item->status == 'progress')
                        progressCount++;
                    @elseif ($item->status != 'done')
                        waitingCount++;
                    @endif
                @endforeach

                const repairChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['เสร็จสิ้น', 'กำลังดำเนินงาน', 'สำเร็จ'],
                        datasets: [{
                            data: [doneRepair, progressCount, waitingCount],
                            backgroundColor: [
                                '#28a745', // Green for done
                                '#ffc107', // Yellow for in progress
                                '#6c757d' // Gray for pending
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.raw || 0;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = Math.round((value / total) * 100);
                                        return `${label}: ${value} (${percentage}%)`;
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    </body>
@endsection

</html>
