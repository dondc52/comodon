<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Posts">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                </span>
            </div><!-- /input-group -->
            <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget author_widget">
            @if ($result[0]->image !== null)
                <img class="author_img rounded-circle" src="{{ asset('images/'.$result[0]->image) }}" alt="" />
            @else
                <img class="author_img rounded-circle" src="{{ asset('images/1618897571-abc.png') }}" alt="" />
            @endif 
            <h4>{{$result[0]->author_name}}</h4>
            <p>{{$result[0]->title}}</p>
            <div class="social_icon">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </div>
            <p>{{$result[0]->subtitle}}</p>
            <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title">Popular Posts</h3>
            @foreach ($result1 as $row)
                <div class="media post_item">
                    @if ($row->image !== null)
                        <img width="100" height="60px" src="{{ asset('images/'.$row->image) }}" alt="post" />
                    @else
                        <img width="100" height="60px" src="{{ asset('images/1618897571-abc.png') }}" alt="post" />
                    @endif 
                    <div class="media-body">
                        <a href="blog-details.html"><h3>{{$row->title}}</h3></a>
                        <p>02 Hours ago</p>
                        <p>{{now()->diffForHumans($row->created_at)}}</p>
                    </div>
                </div>
            @endforeach 
            <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget ads_widget">
            <a href="#"><img class="img-fluid" src="{{ asset('assets/img/blog/add.jpg') }}" alt=""></a>
            <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Post Catgories</h4>
            <ul class="list cat-list">
                @foreach ($result2 as $row)
                <li>
                    <a href="#" class="d-flex justify-content-between">
                        <p>{{ $row->cat_name }}</p>
                        <p>{{ count($row->posts) }}</p>
                    </a>
                </li>
                @endforeach 														
            </ul>
            <div class="br"></div>
        </aside>
        <aside class="single-sidebar-widget newsletter_widget">
            <h4 class="widget_title">Newsletter</h4>
            <p>
            Here, I focus on a range of items and features that we use in life without
            giving them a second thought.
            </p>
            <form action="{{route('sendemail')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                    </div>
                    <button type="submit" class="bbtns border-0">Subcribe</button>
                </div>	
            </form>
            <p class="text-bottom">You can unsubscribe at any time</p>	
            <div class="br"></div>							
        </aside>
        <aside class="single-sidebar-widget tag_cloud_widget">
            <h4 class="widget_title">Tag Clouds</h4>
            <ul class="list">
                <li><a href="#">Technology</a></li>
                <li><a href="#">Fashion</a></li>
                <li><a href="#">Architecture</a></li>
                <li><a href="#">Fashion</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Technology</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Art</a></li>
                <li><a href="#">Adventure</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Adventure</a></li>
            </ul>
        </aside>
    </div>
</div>