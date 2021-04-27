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
        <form action="{{ route('ratting.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">User name: </label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name input" value="{{ old('name') }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Content: </label>
                <input type="text" class="form-control @error('content') is-invalid @enderror" placeholder="Content input" name="content" value="{{ old('content') }}">
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Star number: </label>
                <input type="number" class="form-control @error('star_number') is-invalid @enderror" placeholder="Star number input" name="star_number" value="{{ old('star_number') }}">
            </div>
            @error('star_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Score: </label>
                <input type="number" class="form-control @error('score') is-invalid @enderror" placeholder="Score input" name="score" value="{{ old('score') }}">
            </div>
            @error('score')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('ratting.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection