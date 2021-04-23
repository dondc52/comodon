@extends('backend.layouts.admin')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            Edit
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">New Name: </label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name input" value="{{ $user->name }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Password: </label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password input" name="password" value="">
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('user.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection