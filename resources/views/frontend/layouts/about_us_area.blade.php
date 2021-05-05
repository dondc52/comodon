<!--================Start About Us Area =================-->
<section class="about_us_area section_gap_top">
    <div class="container">
        <div class="row about_content align-items-center">
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

                    @if ($result->image !== null)
                        <img width="540px" class="img-fluid w-100"
                            src="{{ asset('images/' . $result->image) }}" alt="">
                    @else
                        <img width="540px" class="img-fluid"
                            src="{{ asset('images/1618911794-.png') }}" alt="">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End About Us Area =================-->
