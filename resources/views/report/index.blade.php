@extends('layouts.app')

@section('title', 'รายงานงานซ่อม')

@section('content')
<div class="container mt-4">
    <h2>รายงานงานซ่อม</h2>

    <a href="{{ route('report.download') }}" class="btn btn-success mb-3">
        <i class="fas fa-download"></i> ดาวน์โหลดรายงาน (PDF)
    </a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>รหัสงานซ่อม</th>
                <th>ชื่อผู้แจ้ง</th>
                <th>อุปกรณ์</th>
                <th>รายละเอียดปัญหา</th>
                <th>สถานะ</th>
                <th>วันที่แจ้งซ่อม</th>
            </tr>
        </thead>
        <tbody>
            @foreach($repairs as $repair)
            <tr>
                <td>{{ $repair->id }}</td>
                <td>{{ $repair->user_name }}</td>
                <td>{{ $repair->equipment }}</td>
                <td>{{ $repair->description }}</td>
                <td>
                    @if($repair->status == 'pending')
                        <span class="badge bg-secondary">รอดำเนินการ</span>
                    @elseif($repair->status == 'in progress')
                        <span class="badge bg-warning text-dark">กำลังดำเนินการ</span>
                    @elseif($repair->status == 'completed')
                        <span class="badge bg-success">เสร็จสิ้น</span>
                    @endif
                </td>
                <td>{{ $repair->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
