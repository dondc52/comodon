
    
    <nav class="px-3" aria-label="Page navigation example">
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
                            <a class="page-link" href="?page={{ $i }}&{{ $query }}">{{$i}}</a>
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

