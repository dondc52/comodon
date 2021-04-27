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
        <form action="{{ route('category.update', $result->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">New Name: </label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name input" value="{{ $result->cat_name }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">New Description: </label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Description input" name="description" value="{{ $result->description }}">
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Image: </label>
                @if ($result->image !== null)
                        <div class="w-100 py-2">
                            <img width="80px" src="{{ asset('images/'.$result->image) }}" alt="" />
                        </div>
                    @else
                        <div class="w-100 py-2">
                            <img width="80px" src="{{ asset('images/1618897571-abc.png') }}" alt="" />
                        </div>
                    @endif 
                <input class="w-100" type="file" name="image" value="">
            </div>
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ route('category.index') }}">Quay Lại</a>
        </form>
    </div>
</div>
@endsection