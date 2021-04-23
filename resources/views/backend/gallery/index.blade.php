@extends('backend.layouts.admin')
@section('content')
@include('layouts.flash-message')
<div class="card">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                Create
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Image: </label>
                    <input class="w-100" type="file" name="image">
                </div>
                <button class="btn btn-primary mr-3" type="submit">Submit</button>
            </form>
        </div>
    </div>
    <div class="card-header">
        <h3 class="card-title">Gallery</h3>
    </div>
    <div class="card-body d-flex flex-wrap" id="gallery">
        @foreach ($result as $row)
            <div class="image position-relative">
                <img width="180px" height="180px" src="{{ asset('images/'.$row->image) }}" alt="" >
                <a style="top:2px; right:2px" data-action="{{ route('gallery.destroy', $row->id ) }}" class="btn btn-sm btn-danger position-absolute deleteStudent" >
                    <i class="fas fa-trash-alt"></i>
                </a>
            </div>
        @endforeach
    </div>
</div>
@include('backend.layouts.modal')
@endsection