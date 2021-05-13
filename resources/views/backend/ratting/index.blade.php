@extends('backend.layouts.admin')
@section('content')
<div class="card col-10">
    @include('layouts.flash-message')
    <div class="card-header">
        <h3 class="card-title">Ratting</h3>
        <a class="btn btn-success float-right" href="{{ route('ratting.create')}}">Create</a>
    </div>
    <div class="card-body">
        <form id="submitDon" action="{{ route('ratting.index') }}" class="row mb-3 pr-2 col-10" method="get">
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
                    <th width="10%">Name </th>
                    <th width="">Content </th>
                    <th width="5%">Star </th>
                    <th width="5%">Score </th>
                    <th width="10%">Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rattings as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->user_name }}</td>
                    <td width="60%">{{ $row->content }}</td>
                    <td>{{ $row->star_number }}</td>
                    <td>{{ $row->score }}</td>
                    <td width="10%">
                        <a class="btn btn-warning text-white" href="{{ route('ratting.edit', $row->id) }}"><i class="fas fa-edit"></i></a>
                        <a data-action="{{ route('ratting.destroy', $row->id ) }}" class="btn btn-danger delete" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$rattings->appends(['search'=>$search, 'numPerPage' => $numPerPage])->links()}}
    </div>
</div>
@include('backend.layouts.modal')
@endsection