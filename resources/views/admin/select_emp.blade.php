@extends('layouts.app')

@section('content')

    <body>
        <div class="mt-5">
            <h3>Customer Repair Requests</h3>
            <form action="{{ route('assign.repair', $repair_edit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Repair ID</th>
                            <th scope="col">Repair Detail</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Select Employee</th>
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
                                    <option value="">Select Employee</option>
                                    @foreach ($emp as $emp_select)
                                        <option value="{{ $emp_select->id }}">{{ $emp_select->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button type="submit" class="btn btn-success mt-3">Assign Employee</button>
            </form>
        </div>
    </body>
@endsection
