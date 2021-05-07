@extends('backend.layouts.admin')
@section('content')
<div class="card col-md-8">
    <div class="card-header">
        <h3 class="card-title">
            Create
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Ttile *</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Content </label>
                <input type="text" class="form-control" name="content" value="{{ old('content') }}">
            </div>
            <div class="form-group">
                <label for="">Link video </label>
                <input type="text" class="form-control" name="video_link" value="{{ old('video_link') }}">
            </div>
            <div class="form-group">
                <label for="">Image </label>
                <input class="w-100" type="file" name="image">
            </div>
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('banner.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection