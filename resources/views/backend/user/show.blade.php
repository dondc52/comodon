@extends('backend.layouts.admin')
@section('content')
    @include('layouts.flash-message')
    <div class="card col-6 pb-3">
        <div class="card-header">
            <h2 class="card-title">User infor</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                @if($user->image)  
                    <img src="{{asset('images/' . $user->image)}}" alt="">   
                @endif
            </div>
            <div class="form-group">
                <label for="">Name: </label>
                <strong>{{ $user->name }}</strong>
            </div>
            <div class="form-group">
                <label for="">Email: </label>
                <strong>{{ $user->email }}</strong>
            </div>
            <div class="form-group">
                <label for="">Desscription: </label>
                <strong>{{ $user->title }}</strong>
            </div>
        </div>
        <div class="ml-3">
            <a class="btn btn-info" href="{{ route('user.edit', $user->id) }}">Chỉnh sửa</a>
            <a class="btn btn-secondary ml-3" href="{{ route('user.index') }}">Quay Lại</a>
        </div>
    </div>
    @include('backend.layouts.modal')
@endsection
