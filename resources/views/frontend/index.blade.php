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