@extends('backend.layouts.admin')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            Create
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Title: </label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title input" value="{{ old('title') }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Content: </label>
                <textarea id="summernote" class="form-control" name="content">
                    Content input...
                </textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <select class="form-control" name="cat_id" id="cat_id">
                <option value="0">Select category</option>
                @foreach ($result as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
            @error('cat_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Image: </label>
                <input class="w-100" type="file" name="image">
            </div>
            <div class="form-group">
                <label for="">Comment number: </label>
                <input type="number" name="comment_number" class="form-control" value="{{ old('comment_number') }}">
            </div>
            <div class="form-group">
                <label for="">View number: </label>
                <input type="number" name="view_number" class="form-control" value="{{ old('view_number') }}">
            </div>
            <div class="form-group">
                <label for="">Like number: </label>
                <input type="number" name="like_number" class="form-control" value="{{ old('like_number') }}">
            </div>
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('post.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection