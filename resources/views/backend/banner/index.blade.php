@extends('backend.layouts.admin')
@section('content')
<div class="card col-md-8">
    @include('layouts.flash-message')
    <div class="card-header">
        <h3 class="card-title">
            Banner
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('banner.update', $result->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Title *</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $result->title }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Content *</label>
                <input type="text" class="form-control" name="content" value="{{ $result->content }}">
            </div>
            <div class="form-group">
                <label for="">Link Video</label>
                <input type="text" class="form-control" name="video_link" value="{{ $result->video_link }}">
            </div>
            <div class="form-group">
                <label for="">Image </label>
                @if ($result->image !== null)
                        <div class="w-100 py-2">
                            <img width="80px" src="{{ asset('images/'.$result->image) }}" alt="" />
                        </div>
                    @endif 
                <input class="w-100" type="file" name="image" value="">
            </div>
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection