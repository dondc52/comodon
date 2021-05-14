@extends('backend.layouts.admin')
@section('content')
<div class="card col-10">
    @include('layouts.flash-message')
    <div class="card-header">
        <h3 class="card-title">Frequently Asked Questions</h3>
        <a class="btn btn-success float-right" href="{{ route('package.create')}}">Create</a>
    </div>
    <div class="card-body">
        <form id="submitDon" action="{{ route('package.index') }}" class="row mb-3 pr-2 col-10" method="get">
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
                    <th width="20%">Title </th>
                    <th width="15%">Description 1 </th>
                    <th width="15%">Description 2 </th>
                    <th width="15%">Description 3 </th>
                    <th width="10%">Price </th>
                    <th width="10%">Display </th>
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
                        <form action="{{ route('package.updateStatus', $row->id) }}" method="post">
                            @csrf
                            <div class="custom-control col-6 custom-switch form-check mx-auto">
                                <input type="checkbox" class="custom-control-input status" id="switch{{$row->id}}" name="status" value="1" {{$row->status == 1 ? 'checked' : ''}}>
                                <label class="custom-control-label" for="switch{{$row->id}}"></label>
                            </div>
                        </form> 
                    </td>
                    <td>
                        <a class="btn btn-warning text-white" href="{{ route('package.edit', $row->id) }}"><i class="fas fa-edit"></i></a>
                        <a data-action="{{ route('package.destroy', $row->id ) }}" class="btn btn-danger delete" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $packages->appends(['search' => $search, 'numPerPage' => $numPerPage])->links() }}
    </div>
</div>
@include('backend.layouts.modal')
@endsection