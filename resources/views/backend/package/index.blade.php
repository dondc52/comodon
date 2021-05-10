@extends('backend.layouts.admin')
@section('content')
<div class="card col-10">
    @include('layouts.flash-message')
    <div class="card-header">
        <h3 class="card-title">Frequently Asked Questions</h3>
        <a class="btn btn-success float-right" href="{{ route('package.create')}}">Create</a>
    </div>
    <div class="card-body">
        <form action="{{ route('package.index') }}" class="row mb-3 pr-2 col-4" method="get">
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
                    <th width="20%">Title </th>
                    <th width="15%">Description 1 </th>
                    <th width="15%">Description 2 </th>
                    <th width="15%">Description 3 </th>
                    <th width="10%">Price </th>
                    <th width="10%">Status </th>
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
                    <td>
                        @if($row->status == 1)
                            Show
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-warning text-white" href="{{ route('package.edit', $row->id) }}"><i class="fas fa-edit"></i></a>
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
        {{ $packages->appends(['search' => $search])->links() }}
    </div>
</div>
@include('backend.layouts.modal')
@endsection