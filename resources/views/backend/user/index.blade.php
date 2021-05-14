@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md-10">
        @include('layouts.flash-message')
        <div class="card-header">
            <h2 class="card-title">User</h2>
            <a class="btn btn-success float-right" href="{{ route('user.create') }}">Create</a>
        </div>
        <div class="card-body">
            <form id="submitDon" action="{{ route('user.index') }}" class="row mb-3 pr-2 col-10" method="get">
                <div class="col-1 pl-0">
                    <select class="form-control selectDon" name="numPerPage">
                        <option value="5" {{$numPerPage == 5 ? 'selected' : ''}}>5</option>
                        <option value="10" {{$numPerPage == 10 ? 'selected' : ''}}>10</option>
                        <option value="15" {{$numPerPage == 15 ? 'selected' : ''}}>15</option>
                        <option value="20" {{$numPerPage == 20 ? 'selected' : ''}}>20</option>
                    </select>
                </div>
                <div class="input-group col-6">
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
                    @foreach ($users as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->title }}</td>
                            <td>
                                @if ($row->image)
                                    <img height="70px" src="{{ asset('images/' . $row->image) }}" alt="">
                                @endif
                            </td>
                            <td>{{ $row->email }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('user.show', $row->id) }}"><i
                                        class="fas fa-info-circle"></i></a>
                                <a class="btn btn-warning text-white" href="{{ route('user.edit', $row->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a class="btn btn-warning text-white" href="{{ route('user.editpw', $row->id) }}"><i
                                        class="fas fa-key"></i></a>
                                <a data-action="{{ route('user.destroy', $row->id) }}"
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
            {{ $users->appends(['search' => $search, 'numPerPage' => $numPerPage])->links() }}
        </div>
    </div>
    @include('backend.layouts.modal')
@endsection
