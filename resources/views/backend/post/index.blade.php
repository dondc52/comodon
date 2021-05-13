@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md">
        @include('layouts.flash-message')
        <div class="card-header">
            <h3 class="card-title">Post</h3>
            <a class="btn btn-success float-right" href="{{ route('post.create') }}">Create</a>
        </div>
        <div class="card-body">
            <div class="mb-3 col-9 p-0">
                <form action="{{ route('post.index') }}" class="row" method="get">
                    <div class="col-md-3">
                        <select class="form-control" name="cate">
                            <option value="" >Select category</option>
                            @foreach ($cates as $row)
                                <option value="{{ $row->id }}" {{ $row->id == $cate ? 'selected' : '' }}>
                                    {{ $row->cat_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" name="auth">
                            <option value="">Select author</option>
                            @foreach ($auths as $row)
                                <option value="{{ $row->id }}" {{ $row->id == $auth ? 'selected' : '' }}>
                                    {{ $row->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="search" class="form-control rounded" placeholder="Search..." name="search" value="{{$search}}" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ml-2">Load</button>
                </form>
            </div>
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th width="5%">ID </th>
                        <th width="10%">Title </th>
                        <th>Desciption </th>
                        <th width="10%">Category </th>
                        <th width="10%">Author </th>
                        <th width="10%">Image </th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->description }}</td>
                            <td>{{ $row->cat_name }}</td>
                            <td>{{ $row->name }}</td>
                            <td>
                                @if ($row->image !== null)
                                    <img height="70px" src="{{ asset('images/' . $row->image) }}" alt="">
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-warning text-white" href="{{ route('post.edit', $row->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a data-action="{{ route('post.destroy', $row->id) }}"
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
            {{ $posts->appends(['search'=> $search , 'cate' => $cate, 'auth' => $auth ])->links() }}
        </div>
    </div>
    </div>
    @include('backend.layouts.modal')
@endsection
