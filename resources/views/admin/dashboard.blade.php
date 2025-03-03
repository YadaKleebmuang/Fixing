<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard-customer</title>
</head>


@extends('layouts.app')
@section('content')

    <body>
        <div class="d-flex">
            <h1>Dashboard is_admin</h1>
            <button onclick="window.location.href='{{ route('add.employee') }}'" class="btn btn-success">Add Employee</button>
        </div>
        <div class="mt-5">
            <h3>Cutomers Repair Requests</h3>
            @if ($repair->isEmpty())
                <p>No repair requests found.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Repair ID</th>
                            <th scope="col">Repair Detail</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
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
                                        <button type="button" class="btn btn-primary" disabled>Employee fixing </button>
                                    @elseif($item->status == 'done')
                                        <button type="button" class="btn btn-success" disabled>Success</button>
                                    @else
                                        <form action="{{ route('select.emp', $item->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-warning">Select Employee</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </body>
@endsection

</html>
