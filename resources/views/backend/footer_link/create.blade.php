@extends('backend.layouts.admin')
@section('content')
@include('layouts.flash-message')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            Create
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('footer_link.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Link Name: </label>
                <input type="text" name="link_name" class="form-control @error('link_name') is-invalid @enderror" placeholder="Link Name input" value="{{ old('link_name') }}">
            </div>
            @error('link_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Link Content: </label>
                <input type="text" class="form-control @error('link_content') is-invalid @enderror" placeholder="Link Content input" name="link_content" value="{{ old('link_content') }}">
            </div>
            @error('link_content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Parent Id: </label>
                <input type="number" name="parent_id" class="form-control @error('parent_id') is-invalid @enderror" placeholder="Parent Id input" value="{{ old('parent_id') }}">
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