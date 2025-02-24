@extends('layouts.app')

@section('title', 'ติดตามงานซ่อม')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">ติดตามงานซ่อม</h2>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>รหัสงานซ่อม</th>
                <th>ชื่อผู้แจ้ง</th>
                <th>อุปกรณ์</th>
                <th>รายละเอียดปัญหา</th>
                <th>สถานะ</th>
                <th>วันที่แจ้งซ่อม</th>
                <th>การจัดการ</th>
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
                    <td>
                        <a href="{{ route('repair.show', $repair->id) }}" class="btn btn-info btn-sm">ดูรายละเอียด</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($repairs->isEmpty())
        <div class="alert alert-info text-center">ไม่มีงานซ่อมที่ต้องติดตามในขณะนี้</div>
    @endif
</div>
@endsection
<!-- ตัวอย่างข้อมูลที่ได้จากการเข้าถึง URL: http://localhost:8000/repair/track -->