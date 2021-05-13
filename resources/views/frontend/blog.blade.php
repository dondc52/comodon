@include('frontend.layouts.header_area')

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
        </div>
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
            @if ($categories)
                @foreach ($categories as $row)
                    <div class="col-lg-4">
                        <div class="categories_post">
                            @if($row->image)
                            <img src="{{ asset('images/' . $row->image) }}" alt="post">
                            @else 
                            <img src="{{ asset('images/1619582490-FOOD.jpg') }}" alt="post"> 
                            @endif
                            <a href="{{ route('blog') }}?cate={{ $row->id }}">
                                <div class="categories_details">
                                    <div class="categories_text">
                                        <h5>{{ substr($row->cat_name, 0, 30) }}</h5>
                                        <div class="border_line"></div>
                                        <p>{{ substr($row->description, 0, 40) }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif 
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
                    @foreach ($posts as $row)
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <a class="active"
                                            href="{{ route('blog') }}?cate={{ $row->cat_id }}">{{ $row->cat_name }}</a>
                                    </div>
                                    <ul class="blog_meta list">
                                        <li><a href="{{ route('blog') }}?auth={{ $row->user_id }}">{{ $row->name }}<i class="lnr lnr-user"></i></a></li>
                                        <li><a href="">{{ date('d/m/Y', strtotime($row->created_at)) }}<i
                                                    class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="">{{ $row->view_number }} Views<i class="lnr lnr-eye"></i></a>
                                        </li>
                                        <li><a href="">{{ $row->comment_number }} Comments<i
                                                    class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    @if ($row->image !== null)
                                        <img width="540px" src="{{ asset('images/' . $row->image) }}" alt="" />
                                    @endif
                                    <div class="blog_details">
                                        <a href="{{ route('post.show', $row->id) }}">
                                            <h2>{{ substr($row->title, 0, 50) }}</h2>
                                        </a>
                                        <p>{{ substr($row->description, 0, 200) }}</p>
                                        <a href="{{ route('post.show', $row->id) }}" class="blog_btn">View More</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9 right">
                            <div>
                                {{$posts->appends(['auth'=>$auth, 'cate' => $cate, 'search' => $search])->links()}}
                            </div>
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
    $(document).ready(function() {

        if ($(".alertflash").length) {
            window.location.href = "#contact-main";
        }
    });

</script>
