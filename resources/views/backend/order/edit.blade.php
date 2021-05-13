@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h3 class="card-title">
                Edit
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('order.update', $order->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Customer *</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $order->name }}">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="">Description *</label>
                    <input type="text" class="form-control" name="description" value="{{ $order->description }}">
                </div>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="">Image *</label>
                    @if ($order->image !== null)
                        <div class="w-100 py-2">
                            <img width="80px" src="{{ asset('images/' . $order->image) }}" alt="" />
                        </div>
                    @endif
                    <input class="w-100" type="file" name="image" value="" accept="image/x-png,image/gif,image/jpeg">
                </div>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-primary mr-3" type="submit">Submit</button>
                <a class="btn btn-secondary" href="{{ route('order.index') }}">Quay Lại</a>
            </form>
        </div>
    </div>
@endsection
