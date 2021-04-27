@extends('backend.layouts.admin')
@section('content')
@include('layouts.flash-message')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            Edit
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('post.update', $result->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">New Title: </label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title input" value="{{ $result->title }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Description: </label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description input" value="{{ $result->description }}">
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Content: </label>
                <textarea id="summernote" class="form-control" name="content">
                    {{ $result->content }}
                </textarea>
            </div>
            <select class="form-control" name="cat_id" id="cat_id">
                <option value="0">Select category</option>
                @foreach ($result1 as $row)
                    <option value="{{$row->id}}" {{ $row->id == $result2->id ? 'selected' : '' }}>{{$row->cat_name}}</option>
                @endforeach
            </select>
            @error('cat_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Image: </label>
                @if ($result->image !== null)
                        <div class="w-100 py-2">
                            <img width="80px" src="{{ asset('images/'.$result->image) }}" alt="" />
                        </div>
                    @else
                        <div class="w-100 py-2">
                            <img width="80px" src="{{ asset('images/1618897571-abc.png') }}" alt="" />
                        </div>
                    @endif 
                <input class="w-100" type="file" name="image">
            </div>
            <div class="form-group">
                <label for="">Comment number: </label>
                <input type="number" name="comment_number" class="form-control" value="{{ $result->comment_number }}">
            </div>
            <div class="form-group">
                <label for="">View number: </label>
                <input type="number" name="view_number" class="form-control" value="{{ $result->view_number }}">
            </div>
            <div class="form-group">
                <label for="">Like number: </label>
                <input type="number" name="like_number" class="form-control" value="{{ $result->like_number }}">
            </div>
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('post.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection