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
            <div>

                <!-- mailPopupSuccess -->
                <div class="modal fade" id="mailPopupSuccess" tabindex="-1" role="dialog"
                    aria-labelledby="mailPopupSuccessTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
                            </div>
                            <div class="modal-body">
                                Sign up for our newsletter successfully!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- mailPopupError -->
                <div class="modal fade" id="mailPopupError" tabindex="-1" role="dialog"
                    aria-labelledby="mailPopupErrorsTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
                            </div>
                            <div class="modal-body">
                                Our newsletter registration was unsuccessful!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!--================ End Newsletter Area ================-->
