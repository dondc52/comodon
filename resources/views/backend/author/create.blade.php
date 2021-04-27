@extends('backend.layouts.admin')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            Create
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('author.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name: </label>
                <input type="text" name="author_name" class="form-control @error('author_name') is-invalid @enderror" placeholder="Name input" value="{{ old('author_name') }}">
            </div>
            @error('author_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Title: </label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title input" value="{{ old('title') }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Subtitle: </label>
                <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" placeholder="Subtitle input" value="{{ old('subtitle') }}">
            </div>
            @error('subtitle')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Image: </label>
                <input class="w-100" type="file" name="image">
            </div>
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('author.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection