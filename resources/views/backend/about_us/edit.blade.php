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
        <form action="{{ route('about_us.update', $about_us->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">New Title: </label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title input" value="{{ $about_us->title }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Content: </label>
                <input type="text" class="form-control @error('content') is-invalid @enderror" placeholder="Content input" name="content" value="{{ $about_us->content }}">
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Link: </label>
                <input type="text" class="form-control @error('link') is-invalid @enderror" placeholder="Link input" name="link" value="{{ $about_us->link }}">
            </div>
            @error('link')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Image: </label>
                @if ($about_us->image !== null)
                        <div class="w-100 py-2">
                            <img width="80px" src="{{ asset('images/'.$about_us->image) }}" alt="" />
                        </div>
                    @else
                        <div class="w-100 py-2">
                            <img width="80px" src="{{ asset('images/1618897571-abc.png') }}" alt="" />
                        </div>
                    @endif 
                <input class="w-100" type="file" name="image" value="">
            </div>
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('about_us.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection