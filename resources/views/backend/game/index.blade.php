@extends('backend.layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Game</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th scope="col">ID: </th>
                    <th scope="col">Name: </th>
                    <th scope="col">Description: </th>
                    <th scope="col">Image: </th>
                    <th scope="col">Action: </th>
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
                        @else 
                        
                            <img height="70px" src="{{ asset('images/1618897571-abc.png') }}" alt="">
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
</div>
<div class="pb-3">
    <a class="btn btn-success py-20" href="{{ route('game.create')}}">Create</a>
</div>
@include('backend.layouts.modal')
@endsection