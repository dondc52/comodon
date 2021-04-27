
<!--========== Start Testimonials Area ==================-->
<section class="testimonials_area section_gap">
	<div class="container">
		<div class="testi_slider owl-carousel">
			@foreach ($rattingresult as $row)
				<div class="testi_item">
					<h1>{{$row->score}}</h1>
					<h4>{{$row->user_name}}</h4>
					<ul class="list">
						@for ($i = 1; $i <= $row->star_number; $i++)
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						@endfor 
					</ul>
					<div class="wow fadeIn" data-wow-duration="1s">
						<p>{{$row->content}}</p>
					</div>
				</div>
			@endforeach 
		</div>
	</div>
</section>
<!--================ End Testimonials Area ================-->
