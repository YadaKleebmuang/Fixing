@extends('layouts.app')

@section('title', 'รายละเอียดงานซ่อม')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">รายละเอียดงานซ่อม</h2>

    <div class="card">
        <!-- ✅ เปลี่ยน bg-primary เป็น bg-dark -->
        <div class="card-header bg-dark text-white">
            งานซ่อม #{{ $repair->id }}
        </div>

        <div class="card-body">
            <h5 class="card-title"><strong>ชื่อผู้แจ้ง:</strong> {{ $repair->user_name }}</h5>
            <p class="card-text"><strong>เบอร์โทร:</strong> {{ $repair->phone }}</p>
            <p class="card-text"><strong>อุปกรณ์ที่ซ่อม:</strong> {{ $repair->equipment }}</p>
            <p class="card-text"><strong>รายละเอียดปัญหา:</strong><br>{{ $repair->description }}</p>
            <p class="card-text"><strong>สถานะ:</strong>
                @if($repair->status == 'completed')
                    <span class="badge bg-success">เสร็จสิ้น</span>
                @elseif($repair->status == 'in progress')
                    <span class="badge bg-warning text-dark">กำลังดำเนินการ</span>
                @else
                    <span class="badge bg-secondary">รอดำเนินการ</span>
                @endif
            </p>
            <p class="card-text"><strong>วันที่แจ้งซ่อม:</strong> {{ $repair->created_at->format('d/m/Y H:i') }}</p>

            <div class="mt-4">
                <a href="{{ route('repair.index') }}" class="btn btn-secondary">กลับ</a>
                <a href="{{ route('repair.edit', $repair->id) }}" class="btn btn-warning">แก้ไข</a>
            </div>
        </div>
    </div>
</div>
@endsection

