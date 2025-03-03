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
            <h1>Dashboard - Customer</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('repair.update', $repair_edit->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="repair_detail" class="form-label">Repair Detail:</label>
                    <textarea name="repair_detail" id="repair_detail" class="form-control" rows="4" required>{{ old('repair_detail', $repair_edit->repair_detail) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Repair Request</button>
            </form>
        </div>
    </body>
@endsection


</html>
