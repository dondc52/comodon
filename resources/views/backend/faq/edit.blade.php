@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h3 class="card-title">
                Edit
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('faq.update', $result->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title *</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ $result->title }}">
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="">Content *</label>
                    <input type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                        value="{{ $result->content }}">
                </div>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="custom-control col-6 custom-switch form-check mb-3">
                    <input type="checkbox" class="custom-control-input" id="switch1" name="status" value="1" {{$result->status == 1 ? 'checked' : ''}}>
                    <label class="custom-control-label" for="switch1">Display</label>
                </div>
                <button class="btn btn-primary mr-3" type="submit">Submit</button>
                <a class="btn btn-secondary" href="{{ route('faq.index') }}">Quay Lại</a>
            </form>
        </div>
    </div>
@endsection
