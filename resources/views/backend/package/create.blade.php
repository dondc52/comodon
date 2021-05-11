@extends('backend.layouts.admin')
@section('content')
<div class="card col-6">
    <div class="card-header">
        <h3 class="card-title">
            Create
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('package.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Title *</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Description 1 * </label>
                <input type="text" class="form-control @error('description1') is-invalid @enderror" name="description1" value="{{ old('description1') }}">
            </div>
            @error('description1')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Description 2 </label>
                <input type="text" class="form-control" name="description2" value="{{ old('description2') }}">
            </div>
            <div class="form-group">
                <label for="">Description 3 </label>
                <input type="text" class="form-control" name="description3" value="{{ old('description3') }}">
            </div>
            <div class="form-group">
                <label for="">Price *</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
            </div>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="custom-control col-6 custom-switch form-check mb-3">
                <input type="checkbox" class="custom-control-input" id="switch1" name="status" value="1">
                <label class="custom-control-label" for="switch1">Display</label>
            </div>
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('package.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection