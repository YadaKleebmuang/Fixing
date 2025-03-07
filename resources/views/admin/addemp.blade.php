@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>เพิ่มพนักงานใหม่</h1>

    <!-- แสดงข้อความแจ้งเตือนเมื่อเพิ่มพนักงานสำเร็จ -->
    @if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    <!-- Form for adding a new employee -->
    <form action="{{ route('add.employee') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">ชื่อ</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">รหัสผ่าน</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>

        <button type="submit" class="btn btn-success">เพิ่มพนักงาน</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">กลับไปหน้าแดชบอร์ด</a>

    </form>

    <!-- แสดงข้อความแจ้งเตือนข้อผิดพลาด -->
    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection