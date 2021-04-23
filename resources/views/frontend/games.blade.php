@include('frontend.layouts.header_area')

<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
		<div class="container">
			<div class="banner_content text-center">
				<div class="page_link">
					<a href="index.html">Home</a>
					<a href="games.html">Upcoming Games</a>
				</div>
				<h2>Upcoming Games</h2>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

@include('frontend.layouts.upcoming_games_area')

@include('frontend.layouts.recent_update_area')	
	
@include('frontend.layouts.frequently_asked_questions')
	
@include('frontend.layouts.newsletter_area')

@include('frontend.layouts.footer_area')