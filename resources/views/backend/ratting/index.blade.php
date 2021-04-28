@extends('backend.layouts.admin')
@section('content')
@include('layouts.flash-message')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ratting</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th scope="col">ID: </th>
                    <th scope="col">Name: </th>
                    <th scope="col">Content: </th>
                    <th scope="col">Star number: </th>
                    <th scope="col">Score: </th>
                    <th scope="col">Action: </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rattings as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->user_name }}</td>
                    <td width="60%">{{ $row->content }}</td>
                    <td>{{ $row->star_number }}</td>
                    <td>{{ $row->score }}</td>
                    <td width="10%">
                        <a class="btn btn-info" href="{{ route('ratting.edit', $row->id) }}"><i class="fas fa-edit"></i></a>
                        <a data-action="{{ route('ratting.destroy', $row->id ) }}" class="btn btn-danger deleteStudent" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$rattings->links()}}
    </div>
</div>
<div class="pb-3">
    <a class="btn btn-success py-20" href="{{ route('ratting.create')}}">Create</a>
</div>
@include('backend.layouts.modal')
@endsection