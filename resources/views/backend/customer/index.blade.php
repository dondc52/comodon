@extends('backend.layouts.admin')
@section('content')
@include('layouts.flash-message')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            Create
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('customer.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Email: </label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email input" value="{{ old('email') }}">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-primary mr-3" type="submit">Submit</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Customers</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th width="10%" scope="col">ID: </th>
                    <th scope="col">Email: </th>
                    <th width="10%" scope="col">Delete: </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $row)
                <tr>
                    <td width="10%">{{ $row->id }}</td>
                    <td>{{ $row->email }}</td>
                    <td width="10%">
                        <a data-action="{{ route('customer.destroy', $row->id ) }}" class="btn btn-danger deleteStudent" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$customers->links()}}
    </div>
</div>
@include('backend.layouts.modal')
@endsection