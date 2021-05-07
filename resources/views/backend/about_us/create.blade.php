@extends('backend.layouts.admin')
@section('content')
<div class="card col-8">
    <div class="card-header">
        <h3 class="card-title">
            Create
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('about_us.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Title *</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Header *</label>
                <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}">
            </div>
            @error('link')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Content *</label>
                <textarea id="summernote" class="form-control" name="content">
                    Content input...
                </textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Image </label>
                <input class="w-100" type="file" name="image">
            </div>
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('about_us.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection