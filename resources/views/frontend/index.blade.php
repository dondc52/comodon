@include('frontend.layouts.header_area')

<!--================Home Banner Area =================-->
<section class="home_banner_area">
	<div class="banner_inner">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="home_left_img">
						@if ($banner->image)
							<img width="540px" class="img-fluid" src="{{ asset('images/'.$banner->image) }}" alt="">
						@endif 
					</div>
				</div>
				<div class="col-lg-6">
					<div class="banner_content">
						@if ($banner)
							<h2>{{substr($banner->title, 0, 35)}}</h2>
							<p>{{substr($banner->content, 0, 150)}}</p>
							<div class="d-flex align-items-center">
								@if($banner->video_link)
									<a id="play-home-video" class="video-play-button" href="{{$banner->video_link}}"><span></span></a>
									<div class="watch_video text-uppercase">
										watch the video
									</div>
								@endif
							</div>
						@endif 
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

