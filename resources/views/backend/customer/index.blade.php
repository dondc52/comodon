@extends('backend.layouts.admin')
@section('content')
    <div class="card col-6">
        @include('layouts.flash-message')
        <div class="card-header">
            <h3 class="card-title">Customers</h3>
            <a class="btn btn-success float-right" href="{{ route('customer.create') }}">Create</a>
        </div>
        <div class="card-body">
            <form action="{{ route('customer.index') }}" class="row mb-3 pr-2 col-4" method="get">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search..." name="search"
                        value="{{ $search }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th width="10%" scope="col">ID: </th>
                        <th scope="col">Email: </th>
                        <th width="10%" scope="col">Delete: </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $row)
                        <tr>
                            <td width="10%">{{ $row->id }}</td>
                            <td>{{ $row->email }}</td>
                            <td width="10%">
                                <a data-action="{{ route('customer.destroy', $row->id) }}"
                                    class="btn btn-danger deleteStudent" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="ml-3">
            {{ $customers->appends(['search' => $search])->links() }}
        </div>
    </div>
    @include('backend.layouts.modal')
@endsection
