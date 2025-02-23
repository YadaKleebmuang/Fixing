@extends('layouts.app')

@section('content')
<div class="container">
    <h2>รายการงานซ่อม</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('repair.create') }}" class="btn btn-primary mb-3">แจ้งซ่อมใหม่</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ชื่อผู้แจ้ง</th>
                <th>อุปกรณ์</th>
                <th>ปัญหา</th>
                <th>สถานะ</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($repairs as $repair)
                <tr>
                    <td>{{ $repair->user_name }}</td>
                    <td>{{ $repair->equipment }}</td>
                    <td>{{ $repair->description }}</td>
                    <td>{{ $repair->status }}</td>
                    <td>
                        <a href="{{ route('repair.show', $repair->id) }}" class="btn btn-info btn-sm">ดู</a>
                        <a href="{{ route('repair.edit', $repair->id) }}" class="btn btn-warning btn-sm">แก้ไข</a>
                        <form action="{{ route('repair.destroy', $repair->id) }}" method="POST" style="display:inline;">
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
