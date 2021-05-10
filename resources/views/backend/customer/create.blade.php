@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h3 class="card-title">
                Create
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Email *</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-primary mr-3" type="submit">Submit</button>
                <a class="btn btn-secondary" href="{{ route('customer.index') }}">Quay Lại</a>
            </form>
        </div>
    </div>
@endsection
