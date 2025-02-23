@extends('layouts.app')

@section('content')
<div class="container">
    <h2>แจ้งซ่อมใหม่</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>พบข้อผิดพลาด!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('repair.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="user_name" class="form-label">ชื่อผู้แจ้ง</label>
            <input type="text" class="form-control" name="user_name" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">เบอร์โทร</label>
            <input type="text" class="form-control" name="phone" required>
        </div>

        <div class="mb-3">
            <label for="equipment" class="form-label">อุปกรณ์</label>
            <input type="text" class="form-control" name="equipment" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">รายละเอียดปัญหา</label>
            <textarea class="form-control" name="description" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
    </form>
</div>
@endsection
