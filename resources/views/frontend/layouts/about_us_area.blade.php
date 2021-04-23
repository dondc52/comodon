
<!--================Start About Us Area =================-->
<section class="about_us_area section_gap_top">
	<div class="container">
		<div class="row about_content align-items-center">
			<div class="col-lg-6">
				<div class="section_content">
					<h6>About Us</h6>
					<h1>{{ $result->title }}</h1>
					<p>{{ $result->content }}</p>
					<a class="primary_btn" href="#">Learn More</a>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about_us_image_box justify-content-center">
					<img class="img-fluid w-100" src="{{ asset('images/'.$result->image) }}" alt="">
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End About Us Area =================-->
