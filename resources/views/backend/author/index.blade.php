@extends('backend.layouts.admin')
@section('content')
@include('layouts.flash-message')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Author</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th scope="col">ID: </th>
                    <th scope="col">Name: </th>
                    <th scope="col">Title: </th>
                    <th scope="col">Subtitle: </th>
                    <th scope="col">Image: </th>
                    <th scope="col">Action: </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->author_name }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->subtitle }}</td>
                    <td>
                        @if ($row->image)
                            <img height="70px" src="{{ asset('images/'.$row->image) }}" alt="">
                        @else 
                        
                            <img height="70px" src="{{ asset('images/1618897571-abc.png') }}" alt="">
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('author.edit', $row->id) }}"><i class="fas fa-edit"></i></a>
                        <a data-action="{{ route('author.destroy', $row->id ) }}" class="btn btn-danger deleteStudent" data-toggle="modal" data-target="#exampleModal">
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
    <a class="btn btn-success py-20" href="{{ route('author.create')}}">Create</a>
</div>
@include('backend.layouts.modal')
@endsection