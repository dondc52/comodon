@extends('backend.layouts.admin')
@section('content')
    @include('layouts.flash-message')
    <div class="card col-6 pb-3">
        <div class="card-header">
            <h2 class="card-title">Order infor</h2>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-3" for="">Name: </label>
                <p class="col-9">{{ $order['name'] }}</p>
            </div>
            <div class="form-group row">
                <label class="col-3" for="">Email: </label>
                <p class="col-9">{{ $order->email }}</p>
            </div>
            <div class="form-group row">
                <label class="col-3" for="">Package: </label>
                <p class="col-9">{{ $order->title }}</p>
            </div>
            <div class="form-group row">
                <label class="col-3" for="">Desscription 1: </label>
                <p class="col-9">{{ $order->description1 }}</p>
            </div>
            <div class="form-group row">
                <label class="col-3" for="">Desscription 2: </label>
                <p class="col-9">{{ $order->description2 }}</p>
            </div>
            <div class="form-group row">
                <label class="col-3" for="">Desscription 3: </label>
                <p class="col-9">{{ $order->description3 }}</p>
            </div>
            <div class="form-group row">
                <label class="col-3" for="">Price: </label>
                <p class="col-9">${{ $order->price }}</p>
            </div>
        </div>
        <div class="ml-3">
            <a class="btn btn-secondary ml-3" href="{{ route('order.index') }}">Quay Lại</a>
        </div>
    </div>
    @include('backend.layouts.modal')
@endsection
