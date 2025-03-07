@extends('layouts.app')

@section('content')

    <body>
        <div class="mt-5">
            <h3>รายละเอียด/ปัญหาของลูกค้า</h3>
            <form action="{{ route('assign.repair', $repair_edit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">เลขที่</th>
                            <th scope="col">ปัญหา</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">วันที่แจ้งซ่อม</th>
                            <th scope="col">วันที่อัพเดท</th>
                            <th scope="col">เลือกพนักงาน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $repair_edit->id }}</td>
                            <td>{{ $repair_edit->repair_detail }}</td>
                            <td>{{ $repair_edit->status }}</td>
                            <td>{{ $repair_edit->created_at->format('Y-m-d H:i') }}</td>
                            <td>{{ $repair_edit->updated_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <select name="employee_id" id="employee_id" class="form-control">
                                    <option value="">เลือกพนักงาน</option>
                                    @foreach ($emp as $emp_select)
                                        <option value="{{ $emp_select->id }}">{{ $emp_select->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button type="submit" class="btn btn-success mt-3">ยืนยันการเลือกพนังงาน</button>
            </form>
        </div>
    </body>
@endsection
