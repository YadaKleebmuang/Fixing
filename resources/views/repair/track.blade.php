@extends('layouts.app')

@section('title', 'ติดตามงานซ่อม')

@section('content')
<div class="container">
    <h2 class="mb-4">ติดตามงานซ่อม</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($repairs->isEmpty())
        <div class="alert alert-info">ยังไม่มีงานซ่อมที่ต้องติดตามในขณะนี้</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>ชื่อผู้แจ้ง</th>
                    <th>อุปกรณ์</th>
                    <th>รายละเอียด</th>
                    <th>สถานะ</th>
                    <th>วันที่แจ้งซ่อม</th>
                    <th>การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($repairs as $index => $repair)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $repair->user_name }}</td>
                        <td>{{ $repair->equipment }}</td>
                        <td>{{ $repair->description }}</td>
                        <td>
                            @if($repair->status == 'completed')
                                <span class="badge bg-success">เสร็จสิ้น</span>
                            @elseif($repair->status == 'in progress')
                                <span class="badge bg-warning text-dark">กำลังดำเนินการ</span>
                            @else
                                <span class="badge bg-secondary">รอดำเนินการ</span>
                            @endif
                        </td>
                        <td>{{ $repair->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('repair.show', $repair->id) }}" class="btn btn-info btn-sm">ดูรายละเอียด</a>
                            @if($repair->status != 'completed')
                                <a href="{{ route('repair.edit', $repair->id) }}" class="btn btn-warning btn-sm">แก้ไข</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
