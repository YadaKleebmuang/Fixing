@extends('layouts.app')

@section('title', 'แก้ไขงานซ่อม')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">แก้ไขงานซ่อม</h2>

    <!-- แสดง Error ถ้ามี -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- ฟอร์มแก้ไขงานซ่อม -->
    <form action="{{ route('repair.update', $repair->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- ใช้สำหรับการอัปเดตข้อมูล -->

        <div class="mb-3">
            <label for="user_name" class="form-label">ชื่อผู้แจ้ง</label>
            <input type="text" name="user_name" class="form-control" value="{{ old('user_name', $repair->user_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">เบอร์โทร</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $repair->phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="equipment" class="form-label">อุปกรณ์ที่ซ่อม</label>
            <input type="text" name="equipment" class="form-control" value="{{ old('equipment', $repair->equipment) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">รายละเอียดปัญหา</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $repair->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">สถานะ</label>
            <select name="status" class="form-select" required>
                <option value="pending" {{ $repair->status == 'pending' ? 'selected' : '' }}>รอดำเนินการ</option>
                <option value="in progress" {{ $repair->status == 'in progress' ? 'selected' : '' }}>กำลังดำเนินการ</option>
                <option value="completed" {{ $repair->status == 'completed' ? 'selected' : '' }}>เสร็จสิ้น</option>
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('repair.show', $repair->id) }}" class="btn btn-secondary">ยกเลิก</a>
            <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
        </div>
    </form>
</div>
@endsection
