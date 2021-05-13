@include('frontend.layouts.header_area')

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="single-blog.html">About Us Details</a>
                </div>
                <h2>ABOUT US DETAILS</h2>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="col-lg-12 posts-list">
            <div class="single-post row">
                <div class="col-lg-12">
                    <div class="feature-img">
                        @if ($about->image !== null)
                            <img class="img-fluid" src="{{ asset('images/'.$about->image) }}" alt="" />
                        @else
                            <img class="img-fluid" src="{{ asset('images/1618897571-abc.png') }}" alt="" />
                        @endif 
                    </div>									
                </div>
                <div class="col-lg-12 col-md-12 blog_details">
                    <h2> {{$about->title}} </h2>
                </div>
                <div class="col-lg-12">
                    <div class="">
                        {!! $about->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@include('frontend.layouts.footer_area')