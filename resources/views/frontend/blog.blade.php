@include('frontend.layouts.header_area')

<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
		<div class="container">
			<div class="banner_content text-center">
				<div class="page_link">
					<a href="index.html">Home</a>
					<a href="about-us.html">Blog</a>
				</div>
				<h2>Blog</h2>
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
                                <a href="{{route('blog')}}?cate={{$row->id}}"><h5>{{ substr($row->cat_name, 0, 30) }}</h5></a>
                                <div class="border_line"></div>
                                <p>{{ substr($row->description, 0, 40) }}</p>
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
                                        <img width="540px" src="{{ asset('images/'.$row->image) }}" alt="" />
                                    @else
                                        <img width="540px" src="{{ asset('images/1618897571-abc.png') }}" alt="" />
                                    @endif 
                                    <div class="blog_details">
                                        <a href="{{route('post.show', $row->id)}}"><h2>{{ substr($row->title, 0, 50) }}</h2></a>
                                        <p>{{ substr($row->description, 0, 200) }}</p>
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
                                    <li class="page-item"><a class="page-link" href="?page={{ $currentPage - 1 }}?cate={{$cateNumber}}">Prev</a></li>
                                @endif
            
                                @if ($currentPage >= 5)
                                    <li class="page-item"><a class="page-link" href="?page={{ 1 }}?cate={{$cateNumber}}">1</a></li>
                                @endif
                                <!-- total pages greater than 8   -->
                                @if($totalPages > 7)
                                    @if ($currentPage < 5)
                                        @for($i = 1; $i <= 5; $i++)
                                            <li class="page-item {{ $i == $currentPage ? 'active': ''}}">
                                                <a class="page-link" href="?page={{ $i }}&cate={{$cateNumber}}">{{$i}}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item"><a class="page-link">...</a></li>
                                        <li class="page-item"><a class="page-link" href="?page={{ $totalPages }}&cate={{$cateNumber}}">{{$totalPages}}</a></li>
                                    @endif
            
                                    @if ($currentPage >= 5 && $currentPage <= $totalPages - 5 )
                                        <li class="page-item"><a class="page-link">...</a></li>
                                        @for($i = $currentPage - 2 ; $i <= $currentPage + 2; $i++)
                                            <li class="page-item {{ $i == $currentPage ? 'active': ''}}">
                                                <a class="page-link" href="?page={{ $i }}&cate={{$cateNumber}}">{{$i}}</a>
                                            </li>
                                         @endfor
                                         <li class="page-item"><a class="page-link">...</a></li>
                                         <li class="page-item"><a class="page-link" href="?page={{ $totalPages }}&cate={{$cateNumber}}">{{$totalPages}}</a></li>
                                    @endif
            
                                    @if ($currentPage >= 5 && $currentPage < $totalPages &&  $currentPage > $totalPages - 5)
                                        <li class="page-item"><a class="page-link">...</a></li>
                                        @for($i = $totalPages - 5 ; $i <= $totalPages; $i++)
                                            <li class="page-item {{ $i == $currentPage ? 'active': ''}}">
                                                <a class="page-link" href="?page={{ $i }}&cate={{$cateNumber}}">{{$i}}</a>
                                            </li>
                                        @endfor
                                    @endif 
            
                                    @if ($currentPage == $totalPages)
                                        <li class="page-item"><a class="page-link">...</a></li>
                                        @for($i = $totalPages - 5 ; $i <= $totalPages; $i++)
                                            <li class="page-item {{ $i == $currentPage ? 'active': ''}}">
                                                <a class="page-link" href="?page={{ $i }}&cate={{$cateNumber}}">{{$i}}</a>
                                            </li>
                                        @endfor
                                    @endif
                                @else
                                    @for($i = 1; $i <= $totalPages; $i++)
                                        <li class="page-item {{ $i == $currentPage ? 'active': ''}}">
                                            <a class="page-link" href="?page={{ $i }}&cate={{$cateNumber}}">{{$i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ($currentPage <= $totalPages - 1) 
                                    <li class="page-item"><a class="page-link" href="?page={{ $currentPage + 1 }}&cate={{$cateNumber}}">Next</a></li>
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
<script>
	$(document).ready(function () {

    if($(".alertflash").length){
        window.location.href = "#contact-main";
    }
});
</script>