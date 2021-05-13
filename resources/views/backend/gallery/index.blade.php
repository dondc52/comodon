@extends('backend.layouts.admin')
@section('content')

    <div class="row">
        <div class="card col-9">
            @include('layouts.flash-message')
            <div class="card-header">
                <h3 class="card-title">Gallery</h3>
            </div>
            <div class="card-body d-flex flex-wrap">
                @foreach ($result as $row)
                    <div class="pr-3 pb-3 position-relative">
                        <img width="180px" height="180px" src="{{ asset('images/' . $row->image) }}" alt="">
                        <a style="top:2px; right:18px" data-action="{{ route('gallery.destroy', $row->id) }}"
                            class="btn btn-sm btn-danger position-absolute delete" data-toggle="modal"
                            data-target="#exampleModal">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-3">
            <div class="card ml-2">
                <div class="card-header">
                    <h3 class="card-title">
                        Create
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Image </label>
                            <input class="w-100" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                        </div>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button class="btn btn-primary mr-3" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('backend.layouts.modal')
@endsection
