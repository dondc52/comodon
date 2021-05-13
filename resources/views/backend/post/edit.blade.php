@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md-10">
        <div class="card-header">
            <h3 class="card-title">
                Edit
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <select class="form-control col-4 pl-0" name="cat_id" id="cat_id">
                    <label for="">Category *</label>
                    <option value="0">Select category</option>
                    @foreach ($categories as $row)
                        <option value="{{ $row->id }}" {{ $row->id == $post->cat_id ? 'selected' : '' }}>
                            {{ $row->cat_name }}</option>
                    @endforeach
                </select>
                @error('cat_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="">Title *</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ $post->title }}">
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="">Description *</label>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                        value="{{ $post->description }}">
                </div>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="">Content *</label>
                    <textarea id="summernote" class="form-control" name="content">
                        {{ $post->content }}
                    </textarea>
                </div>
                <div class="form-group col-3">
                    <label for="">Image </label>
                    @if ($post->image !== null)
                        <div class="w-100 py-2">
                            <img width="80px" src="{{ asset('images/' . $post->image) }}" alt="" />
                        </div>
                    @endif
                    <input class="w-100" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                </div>
                <div class="row">
                    <div class="form-group col-2">
                        <label for="">Comment number </label>
                        <input type="number" name="comment_number" class="form-control"
                            value="{{ $post->comment_number }}">
                    </div>
                    <div class="form-group col-2">
                        <label for="">View number </label>
                        <input type="number" name="view_number" class="form-control" value="{{ $post->view_number }}">
                    </div>
                    <div class="form-group col-2">
                        <label for="">Like number </label>
                        <input type="number" name="like_number" class="form-control" value="{{ $post->like_number }}">
                    </div>
                </div>
                <button class="btn btn-primary mr-3" type="submit">Submit</button>
                <a class="btn btn-secondary" href="{{ route('post.index') }}">Quay Lại</a>
            </form>
        </div>
    </div>
@endsection
