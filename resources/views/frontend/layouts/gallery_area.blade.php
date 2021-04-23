
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
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($result as $row)
                        <div class="col-lg-6 col-md-6">
                            <div class="single-gallery">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{ asset('images/'.$row->image) }}" alt="">
                                <div class="content">
                                    <a class="pop-up-image" href="{{ asset('images/'.$row->image) }}">
                                        <i class="lnr lnr-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach 
                    <div class="col-lg-12">
                        <div class="single-gallery">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{ asset('images/'.$result1[0]->image) }}" alt="">
                            <div class="content">
                                <a class="pop-up-image" href="{{ asset('images/'.$result1[0]->image) }}">
                                    <i class="lnr lnr-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 hidden-md">
                <div class="single-gallery">
                    <div class="overlay"></div>
                    <img class="img-fluid w-100" src="{{ asset('images/'.$result2[0]->image) }}" alt="">
                    <div class="content">
                        <a class="pop-up-image" href="{{ asset('images/'.$result2[0]->image) }}">
                            <i class="lnr lnr-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Gallery Area =================-->