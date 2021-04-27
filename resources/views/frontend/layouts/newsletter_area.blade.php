
<!--================ Start Newsletter Area ================-->
<section class="newsletter_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="newsletter_inner">
                    <h1>Subscribe Our Newsletter</h1>
                    <p>We won’t send any kind of spam</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <aside class="newsletter_widget">
                    <div id="">
                        <form action="{{route('sendemail')}}" method="post" enctype="multipart/form-data">
                            @csrf 
                            <div class="input-group d-flex flex-row">
                                <input name="email" placeholder="Enter email address" type="email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="btn primary_btn">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!--================ End Newsletter Area ================-->