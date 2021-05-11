<!--================ Start Newsletter Area ================-->
<section id="linkflashsendmail" class="newsletter_area">
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
                    @include('layouts.flash-message')
                    <form action="{{ route('sendemail') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group d-flex flex-row">
                            <input name="email" placeholder="Enter email address" type="email">
                            <button type="submit" class="btn primary_btn">Subscribe</button>
                        </div>
                    </form>
                </aside>
            </div>
        </div>
    </div>
</section>
<!--================ End Newsletter Area ================-->
