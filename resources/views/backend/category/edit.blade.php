@extends('backend.layouts.admin')
@section('content')
    @include('layouts.flash-message')
    <div class="card col-md-6">
        <div class="card-header">
            <h3 class="card-title">
                Edit
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name *</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Name input" value="{{ $category->cat_name }}">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for=""> Description *</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $category->description }}">
                </div>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="">Image </label>
                    @if ($category->image !== null)
                        <div class="w-100 py-2">
                            <img width="80px" src="{{ asset('images/' . $category->image) }}" alt="" />
                        </div>
                    @endif
                    <input class="w-100" type="file" name="image" value="">
                </div>
                <div class="custom-control col-6 custom-switch form-check mb-3">
                    <input type="checkbox" class="custom-control-input" id="switch1" name="status" value="1" {{$category->status == 1 ? 'checked' : ''}}>
                    <label class="custom-control-label" for="switch1">Display</label>
                </div>
                <button class="btn btn-primary mr-3" type="submit">Submit</button>
                <a class="btn btn-secondary" href="{{ route('category.index') }}">Quay Lại</a>
            </form>
        </div>
    </div>
@endsection
