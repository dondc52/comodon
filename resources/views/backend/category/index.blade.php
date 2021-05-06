@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md-10">
        <div class="card-header">
            <h3 class="card-title">About us</h3>
            <a class="btn btn-success float-right" href="{{ route('category.create') }}">Create</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th width="5%">ID </th>
                        <th width="15%">Name </th>
                        <th width="">Description </th>
                        <th width="10%">Image </th>
                        <th width="10%">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->cat_name }}</td>
                            <td>{{ $row->description }}</td>
                            <td>
                                @if ($row->image)
                                    <img height="70px" src="{{ asset('images/' . $row->image) }}" alt="">
                                @endif
                            </td>
                            <td width="10%">
                                <a class="btn btn-info" href="{{ route('category.edit', $row->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a data-action="{{ route('category.destroy', $row->id) }}"
                                    class="btn btn-danger deleteStudent" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            @include('backend.layouts.paginate')
        </div>
    </div>
    @include('backend.layouts.modal')
@endsection
