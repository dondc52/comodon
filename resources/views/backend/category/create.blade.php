@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h3 class="card-title">
                Create
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
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
                    <label for="">Description *</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}">
                </div>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="">Image </label>
                    <input class="w-100" type="file" name="image">
                </div>
                <div class="custom-control col-6 custom-switch form-check mb-3">
                    <input type="checkbox" class="custom-control-input" id="switch1" name="status" value="1">
                    <label class="custom-control-label" for="switch1">Display</label>
                </div>
                <button class="btn btn-primary mr-3" type="submit">Submit</button>
                <a class="btn btn-secondary" href="{{ route('category.index') }}">Quay Lại</a>
            </form>
        </div>
    </div>
@endsection
