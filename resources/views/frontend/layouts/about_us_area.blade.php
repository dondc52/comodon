<!--================Start About Us Area =================-->
<section class="about_us_area section_gap_top">
    <div class="container">
        <div class="row about_content align-items-center">
            @if ($about_us)
                <div class="col-lg-6">
                    <div class="section_content">
                        <h6>About Us</h6>
                        <h1>{{ substr($about_us->title, 0, 50) }}</h1>
                        <p>{{ strip_tags(substr($about_us->content, 0, 150)) }}</p>
                        <a class="primary_btn" href="{{ route('about.show', $about_us->id) }}">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_us_image_box justify-content-center">
                        @if ($about_us->image)
                            <img width="540px" class="img-fluid w-100"
                                src="{{ asset('images/' . $about_us->image) }}" alt="">
                        @endif
                    </div>
                </div>
            @endif 
        </div>
    </div>
</section>
<!--================End About Us Area =================-->
