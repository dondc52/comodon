@extends('backend.layouts.admin')
@section('content')
    <div class="card col-8">
        @include('layouts.flash-message')
        <div class="card-header">
            <h3 class="card-title">Footer Link</h3>
            <a class="btn btn-success float-right" href="{{ route('footer_link.create') }}">Create</a>
        </div>
        <div class="card-body">
            <form id="submitDon" action="{{ route('footer_link.index') }}" class="row mb-3 pr-2 col-12" method="get">
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
                        <th width="20%">Title </th>
                        <th width="30%">Link </th>
                        <th width="20%">Parent </th>
                        <th width="20%">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($footer_links as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->link_name }}</td>
                            <td>{{ $row->link_content }}</td>
                            <td>{{ $row->parent() }}</td>
                            <td width="10%">
                                <a class="btn btn-warning text-white" href="{{ route('footer_link.edit', $row->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a data-action="{{ route('footer_link.destroy', $row->id) }}"
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
            {{ $footer_links->appends(['search' => $search, 'numPerPage' => $numPerPage])->links() }}
        </div>
    </div>
    @include('backend.layouts.modal')
@endsection
