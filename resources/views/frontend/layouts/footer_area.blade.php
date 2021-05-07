<!--================Footer Area =================-->
<footer class="footer_area section_gap_top">
    <div class="container">
        <div class="row footer_inner">
            @foreach ($footer_links as $linkItem)
                <div class="col-lg-3 col-sm-6">
                    <aside class="f_widget ab_widget">
                        <div class="f_title">
                            <h4>{{ $linkItem->link_name }}</h4>
                        </div>
                        <ul>
                            @foreach ($linkItem->children as $children)
                                <li><a href="{{ $children->link_content }}"></a>{{ $children->link_name }}</a></li>
                            @endforeach
                        </ul>

                    </aside>
                </div>
            @endforeach
        </div>
        <div class="row single-footer-widget">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="copy_right_text">
                    <p>{{$footer_infor}}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="social_widget">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--================End Footer Area =================-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/stellar.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendors/isotope/isotope-min.js') }}"></script>
<script src="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/vendors/counter-up/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/mail-script.js') }}"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{ asset('assets/js/gmaps.min.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
<script src="{{ asset('admin/fontend.js') }}"></script>

@if (Session::get('sendfiled'))
    <script type="text/javascript">
        swal("Good job!", "You clicked the button!", "success");

    </script>
@endif
</body>

</html>
