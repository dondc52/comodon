@extends('backend.layouts.admin')
@section('content')
    <div class="card col-8">
        <div class="card-header">
            <h3 class="card-title">
                Edit
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('about_us.update', $about_us->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title *</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ $about_us->title }}">
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="">Header</label>
                    <input type="text" name="link" class="form-control"
                        value="{{ $about_us->link }}">
                </div>
                <div class="form-group">
                    <label for="">Content *</label>
                    <textarea id="summernote" class="form-control" name="content">
                        {{ $about_us->content }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="">Image </label>
                    @if ($about_us->image !== null)
                        <div class="w-100 py-2">
                            <img width="80px" src="{{ asset('images/' . $about_us->image) }}" alt="" />
                        </div>
                    @endif
                    <input class="w-100" type="file" name="image" value="">
                </div>
                <div class="custom-control col-6 custom-switch form-check mb-3">
                    <input type="checkbox" class="custom-control-input" id="switch1" name="status" value="1" {{$about_us->status == 1 ? 'checked' : ''}}>
                    <label class="custom-control-label" for="switch1">Display</label>
                </div>
                <button class="btn btn-primary mr-3" type="submit">Submit</button>
                <a class="btn btn-secondary" href="{{ route('about_us.index') }}">Quay Lại</a>
            </form>
        </div>
    </div>
@endsection
