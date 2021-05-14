@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md-8">
        @include('layouts.flash-message')
        <div class="card-header">
            <h2 class="card-title">order</h2>
        </div>
        <div class="card-body">
            <form id="submitDon" action="{{ route('order.index') }}" class="row mb-3 pr-2 col-10" method="get">
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
                        <th width="10%">ID </th>
                        <th width="25%">Customer </th>
                        <th width="">Packages </th>
                        <th width="10%">Delivered </th>
                        <th width="15%">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->title }}</td>
                            <td>
                                <form action="{{ route('order.update', $row->id) }}" method="post">
                                    @csrf
                                    <div class="custom-control col-6 custom-switch form-check mx-auto">
                                        <input type="checkbox" class="custom-control-input status" id="switch{{$row->id}}" name="status" value="1" {{$row->status == 1 ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="switch{{$row->id}}"></label>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('order.show', $row->id) }}"><i
                                    class="fas fa-info-circle"></i></a>
                                <a data-action="{{ route('order.destroy', $row->id) }}"
                                    class="btn btn-danger delete" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pl-3">
            {{$orders->appends(['search' => $search, 'numPerPage' => $numPerPage])->links()}}
        </div>
    </div>
    @include('backend.layouts.modal')
@endsection
