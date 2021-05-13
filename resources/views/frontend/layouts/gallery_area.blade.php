
<!--================ Start Gallery Area =================-->
<section class="gallery_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2>Screens Gallery</h2>
                    <h1>Screens Gallery</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($galleries)
                @foreach ($galleries as $row)
                    <div class="col-lg-4 hidden-md">
                        <div class="single-gallery">
                            <div class="overlay"></div>
                            <img class="w-100" height="300px" src="{{ asset('images/'.$row->image) }}" alt="">
                            <div class="content">
                                <a class="pop-up-image" href="{{ asset('images/'.$row->image) }}">
                                    <i class="lnr lnr-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<!--================ End Gallery Area =================-->