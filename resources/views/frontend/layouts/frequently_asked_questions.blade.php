
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
            <div class="col-lg-5 col-md-5">
                <div class="frequent_item">
                    <h3> {{substr($faqresult[0]->title, 0, 50)}} </h3>
                    <p>{{substr($faqresult[0]->content, 0, 200)}}</p>
                </div>
            </div>
            <div class="offset-lg-2 col-lg-5 offset-md-2 col-md-5">
                <div class="frequent_item">
                    <h3> {{substr($faqresult[1]->title, 0, 50)}} </h3>
                    <p>{{substr($faqresult[1]->content, 0, 200)}}</p>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="frequent_item">
                    <h3> {{substr($faqresult[2]->title, 0, 50)}} </h3>
                    <p>{{substr($faqresult[2]->content, 0, 200)}}</p>
                </div>
            </div>
            <div class="offset-lg-2 col-lg-5 offset-md-2 col-md-5">
                <div class="frequent_item">
                    <h3> {{substr($faqresult[3]->title, 0, 50)}} </h3>
                    <p>{{substr($faqresult[3]->content, 0, 200)}}</p>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="frequent_item last-child">
                    <h3> {{substr($faqresult[4]->title, 0, 50)}} </h3>
                    <p>{{substr($faqresult[4]->content, 0, 200)}}</p>
                </div>
            </div>
            <div class="offset-lg-2 col-lg-5 offset-md-2 col-md-5">
                <div class="frequent_item last-child">
                    <h3> {{substr($faqresult[5]->title, 0, 50)}} </h3>
                    <p>{{substr($faqresult[5]->content, 0, 200)}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Frequently Asked Questions Area ================-->
