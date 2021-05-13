<!--========== Start Testimonials Area ==================-->
<section class="testimonials_area section_gap">
	<div class="container">
		<div class="testi_slider owl-carousel">
			@if ($ratings)
				@foreach ($ratings as $row)
					<div class="testi_item">
						<h1 style="font-size:50px; color:white;">{{$row->score}}</h1>
						<h4>{{substr($row->user_name, 0, 20)}}</h4>
						<ul class="list">
							@for ($i = 1; $i <= $row->star_number; $i++)
								<li><a href="#"><i class="fa fa-star"></i></a></li>
							@endfor 
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>{{substr($row->content, 0, 150)}}</p>
						</div>
					</div>
				@endforeach 
			@endif 
		</div>
	</div>
</section>
<!--================ End Testimonials Area ================-->