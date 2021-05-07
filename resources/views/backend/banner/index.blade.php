@extends('backend.layouts.admin')
@section('content')
<div class="card col-md-10">
    @include('layouts.flash-message')
    <div class="card-header">
        <h3 class="card-title">Banner</h3>
        <a class="btn btn-success float-right" href="{{ route('banner.create')}}">Create</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th width="5%">ID </th>
                    <th width="10%">Title </th>
                    <th width="">Content </th>
                    <th width="10%">Link video</th>
                    <th width="10%">Image </th>
                    <th width="10%">Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->title }}</td>
                    <td width="40%">{{ $row->content }}</td>
                    <td width="10%">{{ $row->video_link }}</td>
                    <td>
                        @if ($row->image)
                            <img height="70px" src="{{ asset('images/'.$row->image) }}" alt="">
                        @endif
                    </td>
                    <td width="10%">
                        <a class="btn btn-info" href="{{ route('banner.edit', $row->id) }}"><i class="fas fa-edit"></i></a>
                        <a data-action="{{ route('banner.destroy', $row->id ) }}" class="btn btn-danger deleteStudent" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$result->links()}}
    </div>
</div>
@include('backend.layouts.modal')
@endsection