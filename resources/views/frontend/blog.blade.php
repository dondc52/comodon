@include('frontend.layouts.header_area')

<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="home_left_img">
                        <img class="img-fluid" src="{{ asset('assets/img/banner/home-left.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner_content">
                        <h2>
                            For All Occasion <br>
                            HairStyle is a Must <br>
                            Try Fashion
                        </h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp or incididunt ut labore et dolore
                            magna aliqua. Ut enim ad minim.
                        </p>
                        <div class="d-flex align-items-center">
                            <a id="play-home-video" class="video-play-button" href="https://www.youtube.com/watch?v=vParh5wE-tM">
                                <span></span>
                            </a>
                            <div class="watch_video text-uppercase">
                                watch the video
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->
    
<!--================Blog Categorie Area =================-->
<section class="blog_categorie_area">
    <div class="container">
        <div class="row">
            @foreach ($result as $row)
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="{{ asset('images/'.$row->image) }}" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="single-blog.html"><h5>{{ $row->cat_name }}</h5></a>
                                <div class="border_line"></div>
                                <p>{{ $row->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
</section>
<!--================Blog Categorie Area =================-->

<!--================Blog Area =================-->
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">
                    @foreach ($result1 as $row)
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <a class="active" href="#">{{ $row->cat_name }}</a>
                                    </div>
                                    <ul class="blog_meta list">
                                        <li><a href="#">{{ $row->name }}<i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#">{{ date('d/m/Y', strtotime($row->created_at)) }}<i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#">{{ $row->view_number }} Views<i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#">{{ $row->comment_number }} Comments<i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    @if ($row->image !== null)
                                        <img src="{{ asset('images/'.$row->image) }}" alt="" />
                                    @else
                                        <img src="{{ asset('images/1618897571-abc.png') }}" alt="" />
                                    @endif 
                                    <div class="blog_details">
                                        <a href="{{route('post.show', $row->id)}}"><h2>{{ $row->title }}</h2></a>
                                        <p>{{$row->description }}</p>
                                        <a href="{{route('post.show', $row->id)}}" class="blog_btn">View More</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach 
                    <div class="row">
                    <div class="col-md-3"></div>
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
            @include('frontend.layouts.blog_right_sidebar')
        </div>
    </div>
</section>
<!--================Blog Area =================-->

@include('frontend.layouts.footer_area')