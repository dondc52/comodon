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
        <form action="{{ route('contact_infor.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Address: </label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $contactInfor->contact_address }}">
            </div>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Address description: </label>
                <input type="text" name="address_des" class="form-control @error('address_des') is-invalid @enderror" value="{{ $contactInfor->contact_address_des }}">
            </div>
            @error('address_des')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <div class="form-group">
                <label for="">Phone: </label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $contactInfor->contact_phone }}">
            </div>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <div class="form-group">
                <label for="">Phone description: </label>
                <input type="text" name="phone_des" class="form-control @error('phone_des') is-invalid @enderror" value="{{ $contactInfor->contact_phone_des }}">
            </div>
            @error('phone_des')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="">Email: </label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $contactInfor->contact_email }}">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <div class="form-group">
                <label for="">Email description: </label>
                <input type="text" name="email_des" class="form-control @error('email_des') is-invalid @enderror" value="{{ $contactInfor->contact_email_des }}">
            </div>
            @error('email_des')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection