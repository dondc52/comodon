@extends('backend.layouts.admin')
@section('content')
    @include('layouts.flash-message')
    <div class="row">
        <div class="card col-md-10 mx-auto">
            <div class="card-header">
                <h2 class="card-title">User</h2>
                <a class="btn btn-success float-right" href="{{ route('user.create') }}">Create</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="">
                        <tr>
                            <th width="5%">ID </th>
                            <th width="15%">Name </th>
                            <th>Description </th>
                            <th width="15%">Image </th>
                            <th width="15%">Email </th>
                            <th width="13%">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->title }}</td>
                                <td>
                                    @if ($user->image)
                                        <img height="70px" src="{{ asset('images/' . $user->image) }}" alt="">
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('user.edit', $user->id) }}"><i
                                            class="fas fa-edit"></i></a>
                                    <a class="btn btn-info" href="{{ route('user.editpw', $user->id) }}"><i
                                            class="fas fa-key"></i></a>
                                    {{-- <a class="" href="">
                                <form action="{{ route('admin.destroy', $admin->id ) }}" method="post">
                                    @csrf 
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>    
                                
                            </a> --}}
                                    <a data-action="{{ route('user.destroy', $user->id) }}"
                                        class="btn btn-danger deleteStudent" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="">
                {{ $users->links() }}
            </div>
        </div>
    </div>
    @include('backend.layouts.modal')
@endsection
