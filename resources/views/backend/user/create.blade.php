@extends('backend.layouts.admin')
@section('content')
        <div class="card col-md-6">
            <div class="card-header">
                <h3 class="card-title">
                    Create
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="">Description </label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Image </label>
                        <input class="w-100" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                    </div>
                    <div class="form-group">
                        <label for="">Email *</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="">Password *</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            value="{{ old('password') }}">
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="">Confirm Password *</label>
                        <input type="password" class="form-control @error('password_confirm') is-invalid @enderror"
                            name="password_confirm" value="{{ old('password_confirm') }}">
                    </div>
                    @error('password_confirm')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-primary mr-3" type="submit">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('user.index') }}">Quay Lại</a>
                </form>
            </div>
        </div>
@endsection
