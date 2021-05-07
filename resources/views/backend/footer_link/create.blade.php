@extends('backend.layouts.admin')
@section('content')
@include('layouts.flash-message')
<div class="card col-6">
    <div class="card-header">
        <h3 class="card-title">
            Create
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('footer_link.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Title </label>
                <input type="text" name="link_name" class="form-control @error('link_name') is-invalid @enderror" value="{{ old('link_name') }}">
            </div>
            @error('link_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Link </label>
                <input type="text" class="form-control @error('link_content') is-invalid @enderror" name="link_content" value="{{ old('link_content') }}">
            </div>
            @error('link_content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group col-3">
                <label for="">Parent id </label>
                <input type="number" name="parent_id" class="form-control @error('parent_id') is-invalid @enderror" value="{{ old('parent_id') }}">
            </div>
            @error('parent_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('footer_link.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection