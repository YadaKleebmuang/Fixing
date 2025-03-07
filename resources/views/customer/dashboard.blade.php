<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

@extends('layouts.app')

@section('content')

    <body>
        <div class="container mt-5">
            <h1>แจ้งซ่อม</h1>

            {{-- Display Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Repair Request Form --}}
            <form action="{{ route('repair.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="repair_detail" class="form-label">รายละเอียดการแจ้งซ่อม/ปัญหา:</label>
                    <textarea name="repair_detail" id="repair_detail" class="form-control" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">ยืนยัน</button>
            </form>

            {{-- Display Repairs in Table --}}
            <div class="mt-5">
                <h3>รายการแจ้งซ่อมของคุณ</h3>
                @if ($repair->isEmpty())
                    <p>No repair requests found.</p>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">เลขที่แจ้งซ่อม</th>
                                <th scope="col">ปัญหา</th>
                                <th scope="col">สถานะ</th>
                                <th scope="col">วันที่แจ้งซ่อม</th>
                                <th scope="col">วันที่อัพเดท</th>
                                <th scope="col">การจัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($repair as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->repair_detail }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                                    <td>{{ $item->updated_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        @if ($item->status == 'progress')
                                            <button type="button" class="btn btn-secondary" disabled>ไม่สามรถลบได้ เนื่องจากกำลังดำเนินการอยู่</button>
                                        @elseif($item->status == 'done')
                                            <button type="button" class="btn btn-success" disabled>สำเร็จ</button>
                                        @else
                                            <form action="{{ route('delrepair', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">ลบ</button>
                                            </form>
                                            <form action="{{ route('editrepair', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" class="btn btn-warning">แก้ไข</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </body>
@endsection

</html>
