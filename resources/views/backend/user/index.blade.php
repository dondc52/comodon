@extends('backend.layouts.admin')
@section('content')
@include('layouts.flash-message')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">User</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th scope="col">ID: </th>
                    <th scope="col">Name: </th>
                    <th scope="col">Email: </th>
                    <th scope="col">Action: </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('user.edit', $user->id) }}"><i class="fas fa-edit"></i></a>
                        {{-- <a class="" href="">
                            <form action="{{ route('admin.destroy', $admin->id ) }}" method="post">
                                @csrf 
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>    
                            
                        </a> --}}
                        <a data-action="{{ route('user.destroy', $user->id ) }}" class="btn btn-danger deleteStudent" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$users->links()}}
    </div>
</div>
<div class="pb-3">
    <a class="btn btn-success py-20" href="{{ route('user.create')}}">Create</a>
</div>
@include('backend.layouts.modal')
@endsection