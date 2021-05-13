@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md-10">
        @include('layouts.flash-message')
        <div class="card-header">
            <h2 class="card-title">User</h2>
            <a class="btn btn-success float-right" href="{{ route('user.create') }}">Create</a>
        </div>
        <div class="card-body">
            
            <form action="{{ route('user.index') }}" class="row mb-3 pr-2 col-4 " method="get">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search..." name="search"
                        value="{{ $search }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th width="5%">ID </th>
                        <th width="15%">Name </th>
                        <th>Description </th>
                        <th width="15%">Image </th>
                        <th width="15%">Email </th>
                        <th width="17%">Action </th>
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
                                <a class="btn btn-info" href="{{ route('user.show', $user->id) }}"><i
                                        class="fas fa-info-circle"></i></a>
                                <a class="btn btn-warning text-white" href="{{ route('user.edit', $user->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a class="btn btn-warning text-white" href="{{ route('user.editpw', $user->id) }}"><i
                                        class="fas fa-key"></i></a>
                                <a data-action="{{ route('user.destroy', $user->id) }}"
                                    class="btn btn-danger delete" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="ml-3">
            {{ $users->appends(['search' => $search])->links() }}
        </div>
    </div>
    @include('backend.layouts.modal')
@endsection
