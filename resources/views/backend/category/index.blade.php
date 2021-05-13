@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md-10">
        @include('layouts.flash-message')
        <div class="card-header">
            <h3 class="card-title">Categories</h3>
            <a class="btn btn-success float-right" href="{{ route('category.create') }}">Create</a>
        </div>
        <div class="card-body">
            <form action="{{ route('category.index') }}" class="row mb-3 pr-2 col-4" method="get">
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
                        <th width="">Description </th>
                        <th width="10%">Image </th>
                        <th width="10%">Display </th>
                        <th width="10%">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories)
                        @foreach ($categories as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->cat_name }}</td>
                                <td>{{ $row->description }}</td>
                                <td>
                                    @if ($row->image)
                                        <img height="70px" src="{{ asset('images/' . $row->image) }}" alt="">
                                    @endif
                                </td>
                                <td>
                                    @if ($row->status == 1)
                                        On
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-warning text-white" href="{{ route('category.edit', $row->id) }}"><i
                                            class="fas fa-edit"></i></a>
                                    <a data-action="{{ route('category.destroy', $row->id) }}"
                                        class="btn btn-danger delete" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif 
                </tbody>
            </table>
        </div>
        <div>
            {{ $categories->appends(['search' => $search])->links() }}
        </div>
    </div>
    @include('backend.layouts.modal')
@endsection
