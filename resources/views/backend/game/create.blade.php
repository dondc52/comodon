@extends('backend.layouts.admin')
@section('content')
@include('layouts.flash-message')
<div class="card col-12 col-md-12 col-xl-6 ">
    <div class="card-header">
        <h3 class="card-title">
            Create
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('game.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name: </label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name input" value="{{ old('name') }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Description: </label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Description input" name="description" value="{{ old('description') }}">
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Image: </label>
                <input class="w-100" type="file" name="image">
            </div>
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('game.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection