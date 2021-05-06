@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md-10">
        <div class="card-header">
            <h2 class="card-title">Game</h2>
            <a class="btn btn-success float-right" href="{{ route('game.create')}}">Create</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th width="5%">ID </th>
                        <th width="15%">Name </th>
                        <th width="">Description </th>
                        <th width="10%">Image </th>
                        <th width="10%">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                    <tr>
                        <td>{{ $game->id }}</td>
                        <td>{{ $game->name }}</td>
                        <td>{{ $game->description }}</td>
                        <td>
                            @if ($game->image)
                                <img height="70px" src="{{ asset('images/'.$game->image) }}" alt="">
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('game.edit', $game->id) }}"><i class="fas fa-edit"></i></a>
                            <a data-action="{{ route('game.destroy', $game->id ) }}" class="btn btn-danger deleteStudent" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            @include('backend.layouts.paginate')
        </div>
    </div>
@include('backend.layouts.modal')
@endsection