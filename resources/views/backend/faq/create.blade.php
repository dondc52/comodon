@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h3 class="card-title">
                Create
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('faq.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Title *</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="">Content *</label>
                    <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}">
                </div>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="1">
                    <label class="form-check-label" for="exampleRadios1">Show</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="status" value="0" checked>
                    <label class="form-check-label" for="exampleRadios2">Hidden</label>
                </div>
                <button class="btn btn-primary mr-3" type="submit">Submit</button>
                <a class="btn btn-secondary" href="{{ route('faq.index') }}">Quay Lại</a>
            </form>
        </div>
    </div>
@endsection
