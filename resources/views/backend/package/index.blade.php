@extends('backend.layouts.admin')
@section('content')
@include('layouts.flash-message')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Frequently Asked Questions</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th scope="col">ID: </th>
                    <th scope="col">Title: </th>
                    <th scope="col">Description1: </th>
                    <th scope="col">Description2: </th>
                    <th scope="col">Description3: </th>
                    <th scope="col">Price: </th>
                    <th scope="col">Action: </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->description1 }}</td>
                    <td>{{ $row->description2 }}</td>
                    <td>{{ $row->description3 }}</td>
                    <td>{{ $row->price }}</td>
                    <td width="10%">
                        <a class="btn btn-info" href="{{ route('package.edit', $row->id) }}"><i class="fas fa-edit"></i></a>
                        <a data-action="{{ route('package.destroy', $row->id ) }}" class="btn btn-danger deleteStudent" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="pb-3">
    <a class="btn btn-success py-20" href="{{ route('package.create')}}">Create</a>
</div>
@include('backend.layouts.modal')
@endsection