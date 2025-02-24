@extends('layouts.app')

@section('title', 'รายการงานซ่อม')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">รายการงานซ่อม</h2>

    <!-- ปุ่มแจ้งซ่อมใหม่ และ ดาวน์โหลด PDF -->
    <div class="mb-3 d-flex justify-content-between">
        <a href="{{ route('repair.create') }}" class="btn btn-primary">แจ้งซ่อมใหม่</a>
        <a href="{{ route('repairs.download.pdf') }}" class="btn btn-danger">ดาวน์โหลด PDF</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ชื่อผู้แจ้ง</th>
                <th>อุปกรณ์</th>
                <th>ปัญหา</th>
                <th>สถานะ</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($repairs as $repair)
                <tr>
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
                        @else
                            <span class="badge bg-danger">สถานะไม่ถูกต้อง</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('repair.show', $repair->id) }}" class="btn btn-info btn-sm">ดู</a>
                        <a href="{{ route('repair.edit', $repair->id) }}" class="btn btn-warning btn-sm">แก้ไข</a>
                        <form action="{{ route('repair.destroy', $repair->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบ?')">ลบ</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
