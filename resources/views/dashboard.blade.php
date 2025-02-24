@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-center">Dashboard</h2>

    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">งานซ่อมทั้งหมด</h5>
                    <p class="card-text">ดูจำนวนงานซ่อมที่มีอยู่ทั้งหมด</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a href="{{ route('repair.index') }}" class="text-white">ดูรายละเอียด</a>
                    <i class="fas fa-wrench"></i>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">งานที่เสร็จสิ้น</h5>
                    <p class="card-text">จำนวนงานที่ซ่อมเสร็จเรียบร้อย</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a href="#" class="text-white">ดูรายละเอียด</a>
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">งานที่กำลังดำเนินการ</h5>
                    <p class="card-text">ดูงานซ่อมที่อยู่ระหว่างดำเนินการ</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a href="#" class="text-white">ดูรายละเอียด</a>
                    <i class="fas fa-spinner"></i>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">งานที่ยังไม่ได้เริ่ม</h5>
                    <p class="card-text">งานซ่อมที่ยังไม่ได้ดำเนินการ</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a href="#" class="text-white">ดูรายละเอียด</a>
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
