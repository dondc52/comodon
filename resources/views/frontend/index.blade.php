@include('frontend.layouts.header_area')

<!--================Home Banner Area =================-->
<section class="home_banner_area">
	<div class="banner_inner">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="home_left_img">
						@if ($bannerresult->image !== null)
							<img width="540px" class="img-fluid" src="{{ asset('images/'.$bannerresult->image) }}" alt="">
						@else 
							<img width="540px" class="img-fluid" src="{{ asset('assets/img/banner/home-left.png') }}" alt="">
						@endif 
					</div>
				</div>
				<div class="col-lg-6">
					<div class="banner_content">
						<h2>{{substr($bannerresult->title, 0, 50)}}</h2>
						<p>{{substr($bannerresult->content, 0, 150)}}</p>
						<div class="d-flex align-items-center">
							<a id="play-home-video" class="video-play-button" href="{{$bannerresult->video_link}}">
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

@include('frontend.layouts.about_us_area')

@include('frontend.layouts.upcoming_games_area')

@include('frontend.layouts.recent_update_area')

@include('frontend.layouts.gallery_area')

@include('frontend.layouts.testimonials_area')

@include('frontend.layouts.pricing_plans_area')

@include('frontend.layouts.frequently_asked_questions')

@include('frontend.layouts.blog_area')

@include('frontend.layouts.newsletter_area')

@include('frontend.layouts.footer_area')

