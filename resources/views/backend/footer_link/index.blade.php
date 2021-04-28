@extends('backend.layouts.admin')
@section('content')
@include('layouts.flash-message')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Footer Link</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th scope="col">ID: </th>
                    <th scope="col">Name: </th>
                    <th scope="col">Link: </th>
                    <th scope="col">Parent: </th>
                    <th scope="col">Action: </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($footer_links as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->link_name }}</td>
                    <td>{{ $row->link_content }}</td>
                    <td>{{ $row->parent_id }}</td>
                    <td width="10%">
                        <a class="btn btn-info" href="{{ route('footer_link.edit', $row->id) }}"><i class="fas fa-edit"></i></a>
                        <a data-action="{{ route('footer_link.destroy', $row->id ) }}" class="btn btn-danger deleteStudent" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$footer_links->links()}}
    </div>
</div>


<div class="pb-3">
    <a class="btn btn-success py-20" href="{{ route('footer_link.create')}}">Create</a>
</div>
@include('backend.layouts.modal')
@endsection