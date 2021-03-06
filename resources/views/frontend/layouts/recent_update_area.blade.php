<!--================Start Recent Update Area =================-->
<section class="recent_update_area section_gap">
    <div class="container">
        <div class="recent_update_inner">
            @if ($recent_about_us)
                <ul class="nav nav-tabs recent-tab-list" id="myTab" role="tablist">
                    @foreach ($recent_about_us as $row)
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#header{{ $row->id }}" role="tab"
                                aria-controls="{{ $row->link }}" aria-selected="true">
                                {{ $row->link }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content recent-content-list" id="myTabContent">
                    @foreach ($recent_about_us as $row)
                        <div class="tab-pane fade show" id="header{{ $row->id }}" role="tabpanel"
                            aria-labelledby="contact-tab">
                            <div class="row recent_update_text">
                                <div class="col-lg-6">
                                    <div class="chart_img">

                                        @if ($row->image !== null)
                                            <img width="540px" class="img-fluid"
                                                src="{{ asset('images/' . $row->image) }}" alt="">
                                        @else
                                            <img width="540px" class="img-fluid"
                                                src="{{ asset('images/1619074957-.png') }}" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="section_content">
                                        <h6>About Us</h6>
                                        <h1>{{ substr($row->title, 0, 50) }}</h1>
                                        <p>{{ strip_tags(substr($row->content, 0, 150)) }}</p>
                                        <a class="primary_btn" href="{{ route('about.show', $row->id) }}">Learn
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif 
        </div>
    </div>
</section>
<!--================End Recent Update Area =================-->
