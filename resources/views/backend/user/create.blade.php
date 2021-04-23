@extends('backend.layouts.admin')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            Create
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name: </label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name input" value="{{ old('name') }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Email: </label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email input" name="email" value="{{ old('email') }}">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Password: </label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password input" name="password" value="{{ old('password') }}">
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