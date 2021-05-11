@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md-10">
        @include('layouts.flash-message')
        <div class="card-header">
            <h3 class="card-title">Frequently Asked Questions</h3>
            <a class="btn btn-success float-right" href="{{ route('faq.create') }}">Create</a>
        </div>
        <div class="card-body">
            <form action="{{ route('faq.index') }}" class="row mb-3 pr-2 col-4" method="get">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search..." name="search" value="{{ $search }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th width="5%">ID </th>
                        <th width="20%">Title </th>
                        <th width="">Content </th>
                        <th width="7%">Display </th>
                        <th width="10%">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->content }}</td>
                            <td>
                                @if ($row->status == 1)
                                    On
                                @endif
                            </td>
                            <td width="10%">
                                <a class="btn btn-warning text-white" href="{{ route('faq.edit', $row->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a data-action="{{ route('faq.destroy', $row->id) }}" class="btn btn-danger deleteStudent"
                                    data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="ml-3">
            {{ $faqs->appends(['search' => $search])->links() }}
        </div>
    </div>
    @include('backend.layouts.modal')
@endsection
