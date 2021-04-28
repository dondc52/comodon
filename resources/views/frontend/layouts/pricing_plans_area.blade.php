
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
            <div class="col-lg-4 col-md-6">
                <div class="pricing_item">
                    <h3 class="p_title">{{$pkresult[0]->title}}</h3>
                    <h1 class="p_price">${{$pkresult[0]->price}}</h1>
                    <div class="p_list">
                        <ul>
                            <li>{{$pkresult[0]->description1}}</li>
                            <li>{{$pkresult[0]->description2}}</li>
                            <li>{{$pkresult[0]->description3}}</li>
                        </ul>
                    </div>
                    <div class="p_btn">
                        <a class="gradient_btn" href="{{route('price')}}"><span>Order Now</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pricing_item active">
                    <h3 class="p_title">{{$pkresult[1]->title}}</h3>
                    <h1 class="p_price">${{$pkresult[1]->price}}</h1>
                    <div class="p_list">
                        <ul>
                            <li>{{$pkresult[1]->description1}}</li>
                            <li>{{$pkresult[1]->description2}}</li>
                            <li>{{$pkresult[1]->description3}}</li>
                        </ul>
                    </div>
                    <div class="p_btn">
                        <a class="gradient_btn" href="{{route('price')}}"><span>Order Now</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 hidden-md">
                <div class="pricing_item">
                    <h3 class="p_title">{{$pkresult[2]->title}}</h3>
                    <h1 class="p_price">${{$pkresult[2]->price}}</h1>
                    <div class="p_list">
                        <ul>
                            <li>{{$pkresult[2]->description1}}</li>
                            <li>{{$pkresult[2]->description2}}</li>
                            <li>{{$pkresult[2]->description3}}</li>
                        </ul>
                    </div>
                    <div class="p_btn">
                        <a class="gradient_btn" href="{{route('price')}}"><span>Order Now</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Pricing Plans Area ================-->
