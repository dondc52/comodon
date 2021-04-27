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
        <form action="{{ route('package.update', $result->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">New Title: </label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title input" value="{{ $result->title }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Description1: </label>
                <input type="text" class="form-control @error('description1') is-invalid @enderror" placeholder="Description1 input" name="description1" value="{{ $result->description1 }}">
            </div>
            @error('description1')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Description2: </label>
                <input type="text" class="form-control @error('description2') is-invalid @enderror" placeholder="Description2 input" name="description2" value="{{ $result->description2 }}">
            </div>
            @error('description2')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Description3: </label>
                <input type="text" class="form-control @error('description3') is-invalid @enderror" placeholder="Description3 input" name="description3" value="{{ $result->description3 }}">
            </div>
            @error('description3')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Price: </label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Price input" name="price" value="{{ $result->price }}">
            </div>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('package.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection