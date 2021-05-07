@extends('backend.layouts.admin')
@section('content')
<div class="card col-10">
    @include('layouts.flash-message')
    <div class="card-header">
        <h3 class="card-title">Frequently Asked Questions</h3>
        <a class="btn btn-success float-right" href="{{ route('package.create')}}">Create</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th width="5%">ID </th>
                    <th width="20%">Title </th>
                    <th width="">Description1 </th>
                    <th width="">Description2 </th>
                    <th width="">Description3 </th>
                    <th width="5%">Price </th>
                    <th width="10%">Action </th>
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
    <div class="card-footer">
        {{$packages->links()}}
    </div>
</div>
@include('backend.layouts.modal')
@endsection