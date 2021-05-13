
<!--================ Start Frequently Asked Questions Area ================-->
<section class="frequently_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2>Frequently Asked Questions</h2>
                    <h1>Frequently Asked Questions</h1>
                </div>
            </div>
        </div>
        <div class="row frequent_inner">
            @if ($faqs->count() > 0)
                @foreach ($faqs as $row)
                    <div class="col-lg-6 col-md-6">
                        <div class="frequent_item">
                            <h3> {{substr($row->title, 0, 50)}} </h3>
                            <p>{{substr($row->content, 0, 200)}}</p>
                        </div>
                    </div>
                @endforeach 
            @endif 
        </div>
    </div>
</section>
<!--================ End Frequently Asked Questions Area ================-->
