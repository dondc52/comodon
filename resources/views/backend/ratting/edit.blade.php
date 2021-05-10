@extends('backend.layouts.admin')
@section('content')
<div class="card col-6">
    <div class="card-header">
        <h3 class="card-title">
            Edit
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('ratting.update', $result->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">User name *</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $result->user_name }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Content *</label>
                <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ $result->content }}">
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Star number *</label>
                        <input type="number" min="1" max="5" class="form-control @error('star_number') is-invalid @enderror" name="star_number" value="{{ $result->star_number }}">
                    </div>
                    @error('star_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Score *</label>
                        <input type="number" min="1" max="99" class="form-control @error('score') is-invalid @enderror" name="score" value="{{ $result->score }}">
                    </div>
                    @error('score')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('ratting.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection