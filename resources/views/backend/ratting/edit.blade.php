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
        <form action="{{ route('ratting.update', $result->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">New User Name: </label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name input" value="{{ $result->user_name }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Content: </label>
                <input type="text" class="form-control @error('content') is-invalid @enderror" placeholder="Content input" name="content" value="{{ $result->content }}">
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Star Number: </label>
                <input type="number" class="form-control @error('star_number') is-invalid @enderror" placeholder="star Number input" name="star_number" value="{{ $result->star_number }}">
            </div>
            @error('star_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Score: </label>
                <input type="number" class="form-control @error('score') is-invalid @enderror" placeholder="Score input" name="score" value="{{ $result->score }}">
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