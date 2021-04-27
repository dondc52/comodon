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
        <form action="{{ route('banner.update', $result->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">New Title: </label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title input" value="{{ $result->title }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Content: </label>
                <input type="text" class="form-control @error('content') is-invalid @enderror" placeholder="Content input" name="content" value="{{ $result->content }}">
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Link Video: </label>
                <input type="text" class="form-control @error('video_link') is-invalid @enderror" placeholder="Link Video input" name="video_link" value="{{ $result->video_link }}">
            </div>
            @error('video_link')
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
                <input class="w-100" type="file" name="image" value="">
            </div>
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('banner.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection