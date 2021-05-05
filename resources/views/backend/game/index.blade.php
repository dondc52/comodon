@extends('backend.layouts.admin')
@section('content')
<div class="row">
    <div class="card col-md-12">
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
                            @else 
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
        <div >
            <div class="col-md-9 right">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        @if($currentPage > 1)
                            <li class="page-item"><a class="page-link" href="?page={{ $currentPage - 1 }}">Prev</a></li>
                        @endif
    
                        @if ($currentPage >= 5)
                            <li class="page-item"><a class="page-link" href="?page={{ 1 }}">1</a></li>
                        @endif
                        <!-- total pages greater than 8   -->
                        @if($totalPages > 7)
                            @if ($currentPage < 5)
                                @for($i = 1; $i <= 5; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active': ''}}">
                                        <a class="page-link" href="?page={{ $i }}">{{$i}}</a>
                                    </li>
                                @endfor
                                <li class="page-item"><a class="page-link">...</a></li>
                                <li class="page-item"><a class="page-link" href="?page={{ $totalPages }}">{{$totalPages}}</a></li>
                            @endif
    
                            @if ($currentPage >= 5 && $currentPage <= $totalPages - 5 )
                                <li class="page-item"><a class="page-link">...</a></li>
                                @for($i = $currentPage - 2 ; $i <= $currentPage + 2; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active': ''}}">
                                        <a class="page-link" href="?page={{ $i }}">{{$i}}</a>
                                    </li>
                                 @endfor
                                 <li class="page-item"><a class="page-link">...</a></li>
                                 <li class="page-item"><a class="page-link" href="?page={{ $totalPages }}">{{$totalPages}}</a></li>
                            @endif
    
                            @if ($currentPage >= 5 && $currentPage < $totalPages &&  $currentPage > $totalPages - 5)
                                <li class="page-item"><a class="page-link">...</a></li>
                                @for($i = $totalPages - 5 ; $i <= $totalPages; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active': ''}}">
                                        <a class="page-link" href="?page={{ $i }}">{{$i}}</a>
                                    </li>
                                @endfor
                            @endif 
    
                            @if ($currentPage == $totalPages)
                                <li class="page-item"><a class="page-link">...</a></li>
                                @for($i = $totalPages - 5 ; $i <= $totalPages; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active': ''}}">
                                        <a class="page-link" href="?page={{ $i }}">{{$i}}</a>
                                    </li>
                                @endfor
                            @endif
                        @else
                            @for($i = 1; $i <= $totalPages; $i++)
                                <li class="page-item {{ $i == $currentPage ? 'active': ''}}">
                                    <a class="page-link" href="?page={{ $i }}">{{$i}}</a>
                                </li>
                            @endfor
                        @endif
                        
                        @if ($currentPage <= $totalPages - 1) 
                            <li class="page-item"><a class="page-link" href="?page={{ $currentPage + 1 }}">Next</a></li>
                        @endif
                    </ul>
                  </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pb-3">
    
</div>
@include('backend.layouts.modal')
@endsection