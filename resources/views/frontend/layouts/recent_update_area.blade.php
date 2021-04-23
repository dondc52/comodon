<!--================Start Recent Update Area =================-->
<section class="recent_update_area section_gap">
    <div class="container">
        <div class="recent_update_inner">
            <ul class="nav nav-tabs recent-tab-list" id="myTab" role="tablist">
                @foreach ($result1 as $row)
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#{{$row->link}}" role="tab" aria-controls="{{$row->link}}" aria-selected="true">
                            Live Streaming
                        </a>
                    </li>
                @endforeach 
            </ul>
            <div class="tab-content recent-content-list" id="myTabContent">
                @foreach($result1 as $row)
                    <div class="tab-pane fade show" id="{{$row->link}}" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row recent_update_text">
                            <div class="col-lg-6">
                                <div class="chart_img">
                                    <img class="img-fluid" src="{{ asset('images/'.$row->image) }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="section_content">
                                    <h6>About Us</h6>
                                    <h1>{{$row->title}}</h1>
                                    <p>{{$row->content}}</p>
                                    <a class="primary_btn" href="#">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--================End Recent Update Area =================-->