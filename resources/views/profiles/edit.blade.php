@extends('profiles.layout')
@section('content')
<div class="card mt-5">
    <h2 class="card-header">Edit Profile</h2>
    <div class="card-body">
        <form method="post" action="{{ route('profiles.update', $profile->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                name="name" id="name" value="{{ $profile->name }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" 
                name="email" id="email" value="{{ $profile->email }}">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                name="image" id="image">
                <img src="{{ asset('images/'.$profile->image) }}" width="100" alt="image">
            </div>
            <div class="form-group"></div>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>Update</button>
            </div>
        </form>
    </div>
</div>
@endSection