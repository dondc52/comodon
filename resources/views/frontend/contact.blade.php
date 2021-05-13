@include('frontend.layouts.header_area')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="contact.html">CONTACT</a>
                </div>
                <h2>CONTACT US</h2>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Contact Area =================-->
<section class="contact_area section_gap">
    <div class="container">
        <iframe id="linkflashsendmail" class="mb-5" src="{{$contactInfor->map}}"
         width="100%" height="550px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        
        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-home"></i>
                        <h6>{{$contactInfor->contact_address}}</h6>
                        <p>{{$contactInfor->contact_address_des}}</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-phone-handset"></i>
                        <h6><a href="">{{$contactInfor->contact_phone}}</a></h6>
                        <p>{{$contactInfor->contact_phone_des}}</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-envelope"></i>
                        <h6><a href="">{{$contactInfor->contact_email}}</a></h6>
                        <p>{{$contactInfor->contact_email_des}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                @include('layouts.flash-message')
                <form class="row contact_form" action="{{route('contact.send')}}" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf 
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Enter your name">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter email address">
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" value="{{old('subject')}}"  placeholder="Enter Subject">
                        </div>
                        @error('subject')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="1" value="{{old('message')}}" placeholder="Enter Message"></textarea>
                        </div>
                        @error('message')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="primary_btn">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================Contact Area =================-->
@include('frontend.layouts.footer_area')
