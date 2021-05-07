@extends('backend.layouts.admin')
@section('content')
<div class="card col-8">
    @include('layouts.flash-message')
    <div class="card-header">
        <h3 class="card-title">Footer Link</h3>
        <a class="btn btn-success float-right" href="{{ route('footer_link.create')}}">Create</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th width="10%">ID </th>
                    <th width="25%">Title </th>
                    <th width="35%">Link </th>
                    <th width="10%">Parent </th>
                    <th width="20%">Action </th>
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
    <div class="ml-3">
        {{$footer_links->links()}}
    </div>
</div>
@include('backend.layouts.modal')
@endsection