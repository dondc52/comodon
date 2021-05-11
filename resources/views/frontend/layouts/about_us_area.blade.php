<!--================Start About Us Area =================-->
<section class="about_us_area section_gap_top">
    <div class="container">
        <div class="row about_content align-items-center">
            @if ($result)
                <div class="col-lg-6">
                    <div class="section_content">
                        <h6>About Us</h6>
                        <h1>{{ substr($result->title, 0, 50) }}</h1>
                        <p>{{ strip_tags(substr($result->content, 0, 150)) }}</p>
                        <a class="primary_btn" href="{{ route('about.show', $result->id) }}">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_us_image_box justify-content-center">
                        @if ($result->image)
                            <img width="540px" class="img-fluid w-100"
                                src="{{ asset('images/' . $result->image) }}" alt="">
                        @endif
                    </div>
                </div>
            @endif 
        </div>
    </div>
</section>
<!--================End About Us Area =================-->
