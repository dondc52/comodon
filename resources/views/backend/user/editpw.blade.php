@extends('backend.layouts.admin')
@section('content')
        <div class="card col-md-5">
            <div class="card-header">
                <h3 class="card-title">
                    Edit
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('user.updatepw', $user->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">New Password *</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            value="">
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="">New Password Confirm *</label>
                        <input type="password_confirm" class="form-control @error('password_confirm') is-invalid @enderror"
                            name="password_confirm" value="">
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
