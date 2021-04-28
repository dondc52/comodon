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
        <form action="{{ route('footer_link.update', $result->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">New Link Name: </label>
                <input type="text" name="link_name" class="form-control @error('link_name') is-invalid @enderror" placeholder="Link Name input" value="{{ $result->link_name }}">
            </div>
            @error('link_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Link Content: </label>
                <input type="text" class="form-control @error('link_content') is-invalid @enderror" placeholder="Link Content input" name="link_content" value="{{ $result->link_content }}">
            </div>
            @error('link_content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Parent: </label>
                <input type="number" class="form-control @error('parent_id') is-invalid @enderror" placeholder="Link Parent input" name="parent_id" value="{{ $result->parent_id }}">
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