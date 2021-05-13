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
                        <th width="10%">Status </th>
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
                                @if ($row->status == 1)
                                    Delivered
                                @endif
                            </td>
                            <td>
                                <a data-action="{{ route('order.update', $row->id) }}" 
                                    class="btn btn-warning text-white update" data-toggle="modal" data-target="#exampleModalUpdate">
                                    <i class="fas fa-people-carry"></i></a>

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
        <div>
            {{$orders->appends(['search' => $search, 'numPerPage' => $numPerPage])->links()}}
        </div>
    </div>
    @include('backend.layouts.modal')
    <div class="modal fade" id="exampleModalUpdate" role="dialog" aria-labelledby="exampleModalLabelUpdate" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelUpdate">Notification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do you want to update?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form id="updateForm" method="post">
                        @csrf
                        <button type="button" id="updateBtn" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
