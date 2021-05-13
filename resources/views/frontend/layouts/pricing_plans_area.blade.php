<!--================ Start Pricing Plans Area ================-->
<section class="pricing_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" id="linkflashorder">
                <div class="main_title">
                    <h2>Pricing Plans</h2>
                    <h1>Pricing Plans</h1>
                </div>
                @if ($message = Session::get('successOrder'))
                    <div class="alert alert-success alert-block alertorder mt-2">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            @if ($packages->count() > 0)
                @foreach ($packages as $row)
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing_item">
                            <h3 class="p_title">{{ substr($row->title, 0, 30) }}</h3>
                            <h1 class="p_price">${{ $row->price }}</h1>
                            <div class="p_list">
                                <ul>
                                    <li>{{ substr($row->description1, 0, 30) }}</li>
                                    <li>{{ substr($row->description2, 0, 30) }}</li>
                                    <li>{{ substr($row->description3, 0, 30) }}</li>
                                </ul>
                            </div>
                            <form action="{{ route('order.store') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $row->id }}" name="package">
                                @if (Auth::user())
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="user">
                                @endif
                                <div class="p_btn">
                                    <button type="submit" class="gradient_btn"><span>Order Now</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<!--================ End Pricing Plans Area ================-->
