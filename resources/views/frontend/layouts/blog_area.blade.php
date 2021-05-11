	
<!--================ Start Blog Area ================-->
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2>Latest Blog Posts</h2>
                    <h1>Latest Blog Posts</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($result)
                @foreach ($result as $row)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog_items">
                            <div class="blog_img_box">
                                @if ($row->image !== null)
                                    <img class="img-fluid" src="{{asset('images/'.$row->image)}}" alt="">
                                @else 
                                    <img class="img-fluid" src="{{ asset('assets/img/blog_img1.png') }}" alt="">
                                @endif
                            </div>
                            <div class="blog_content">
                                <a class="title" href="{{route('post.show', $row->id)}}">{{substr($row->title, 0, 35)}}</a>
                                <p>{{substr($row->description, 0, 150)}}</p>
                                <div class="date">
                                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{date('m-Y', strtotime($row->created_at))}}</a>
                                    <a href="#"><i class="fa fa-heart" aria-hidden="true"></i>{{$row->like_number}}</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{$row->comment_number}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach 
            @endif 
        </div>
    </div>
</section>
<!--================ End Blog Area ================-->
