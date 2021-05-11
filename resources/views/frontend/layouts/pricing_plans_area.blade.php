
<!--================ Start Pricing Plans Area ================-->
<section class="pricing_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2>Pricing Plans</h2>
                    <h1>Pricing Plans</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($pkresult)
                @foreach ($pkresult as $row)
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing_item">
                            <h3 class="p_title">{{substr($row->title, 0, 30)}}</h3>
                            <h1 class="p_price">${{$row->price}}</h1>
                            <div class="p_list">
                                <ul>
                                    <li>{{substr($row->description1, 0, 30)}}</li>
                                    <li>{{substr($row->description2, 0, 30)}}</li>
                                    <li>{{substr($row->description3, 0, 30)}}</li>
                                </ul>
                            </div>
                            <div class="p_btn">
                                <a class="gradient_btn" href="{{route('price')}}"><span>Order Now</span></a>
                            </div>
                        </div>
                    </div>
                @endforeach 
            @endif 
        </div>
    </div>
</section>
<!--================ End Pricing Plans Area ================-->
