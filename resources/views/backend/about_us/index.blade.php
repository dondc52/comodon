@extends('backend.layouts.admin')
@section('content')
<div class="card col-10">
    @include('layouts.flash-message')
    <div class="card-header">
        <h3 class="card-title">About us</h3>
        <a class="btn btn-success float-right" href="{{ route('about_us.create')}}">Create</a>
    </div>
    <div class="card-body">
        <form id="submitDon" action="{{ route('about_us.index') }}" class="row mb-3 pr-2 col-10" method="get">
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
                    <th width="">Header </th>
                    <th width="10%">Image </th>
                    <th width="10%">Display </th>
                    <th width="10%">Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($about_us as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->link }}</td>
                    <td>
                        @if ($row->image)
                            <img height="70px" src="{{ asset('images/'.$row->image) }}" alt="">
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('about_us.updateStatus', $row->id) }}" method="post">
                            @csrf
                            <div class="custom-control col-6 custom-switch form-check mx-auto">
                                <input type="checkbox" class="custom-control-input status" id="switch{{$row->id}}" name="status" value="1" {{$row->status == 1 ? 'checked' : ''}}>
                                <label class="custom-control-label" for="switch{{$row->id}}"></label>
                            </div>
                        </form> 
                    </td>
                    <td width="10%">
                        <a class="btn btn-warning text-white" href="{{ route('about_us.edit', $row->id) }}"><i class="fas fa-edit"></i></a>
                        <a data-action="{{ route('about_us.destroy', $row->id ) }}" class="btn btn-danger delete" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$about_us->appends(['search' => $search, 'numPerPage' => $numPerPage])->links()}}
    </div>
</div>
@include('backend.layouts.modal')
@endsection