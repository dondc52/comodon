@extends('backend.layouts.admin')
@section('content')
    <div class="card col-md-10">
        @include('layouts.flash-message')
        <div class="card-header">
            <h2 class="card-title">Game</h2>
            <a class="btn btn-success float-right" href="{{ route('game.create') }}">Create</a>
        </div>
        <div class="card-body">
            <form action="{{ route('game.index') }}" class="row mb-3 pr-2 col-10" id="submitDon" method="get">
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
                                    <img height="70px" src="{{ asset('images/' . $game->image) }}" alt="">
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-warning text-white" href="{{ route('game.edit', $game->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a data-action="{{ route('game.destroy', $game->id) }}"
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
            {{$games->appends(['search' => $search, 'numPerPage' => $numPerPage])->links()}}
        </div>
    </div>
    @include('backend.layouts.modal')
@endsection
