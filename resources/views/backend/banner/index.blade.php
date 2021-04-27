@extends('backend.layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Banner</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th scope="col">ID: </th>
                    <th scope="col">Title: </th>
                    <th scope="col">Content: </th>
                    <th scope="col">Link video: </th>
                    <th scope="col">Image: </th>
                    <th scope="col">Action: </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->title }}</td>
                    <td width="60%">{{ $row->content }}</td>
                    <td>{{ $row->video_link }}</td>
                    <td>
                        @if ($row->image)
                            <img height="70px" src="{{ asset('images/'.$row->image) }}" alt="">
                        @else 
                        
                            <img height="70px" src="{{ asset('images/1618897571-abc.png') }}" alt="">
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
</div>
<div class="pb-3">
    <a class="btn btn-success py-20" href="{{ route('banner.create')}}">Create</a>
</div>
@include('backend.layouts.modal')
@endsection