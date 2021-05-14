@include('frontend.layouts.header_area')

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="single-blog.html">Blog Details</a>
                </div>
                <h2>BLOG DETAILS</h2>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            @if ($post->image)
                                <img class="img-fluid" src="{{ asset('images/'.$post->image) }}" alt="" />
                            @endif 
                        </div>									
                    </div>
                    <div class="col-lg-3  col-md-3">
                        <div class="blog_info text-right">
                            <div class="post_tag">
                                <a href="{{route('blog')}}?cate={{$post->cat_id}}">{{$category->cat_name}}</a>
                            </div>
                            <ul class="blog_meta list">
                                <li><a href="{{route('blog')}}?auth={{$post->user_id}}">{{$user->name}}<i class="lnr lnr-user"></i></a></li>
                                <li><a href="">{{date('d-m-Y', strtotime($post->created_at))}}<i class="lnr lnr-calendar-full"></i></a></li>
                                <li><a href="">{{$post->view_number}} Views<i class="lnr lnr-eye"></i></a></li>
                                <li><a href="">@if($comments) {{$countCmt}} @endif Comments<i class="lnr lnr-bubble"></i></a></li>
                            </ul>
                            <ul class="social-links">
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-github"></i></a></li>
                                <li><a href=""><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 blog_details">
                        <h2> {{$post->title}} </h2>
                        <p class="excert"> {{$post->description}} </p>
                    </div>
                    <div class="col-lg-12">
                        <div class="">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
                <div class="navigation-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                @if ($prev)
                                @if ($prev->image)
                                <div class="thumb">
                                    <a href="{{route('post.show', $prev->id)}}"><img class="img-fluid" src="{{ asset('images/'. $prev->image) }}" alt=""></a>
                                </div>
                                @endif
                                <div class="arrow">
                                    <a href="{{route('post.show', $prev->id)}}"><span class="lnr text-white lnr-arrow-left"></span></a>
                                </div>
                                <div class="detials">
                                    <p>Prev Post</p>
                                    <a href="{{route('post.show', $prev->id)}}"><h4>{{substr($prev->title, 0, 20)}}</h4></a>
                                </div>
                                @endif
                            </div>
                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                        @if ($next)
                                <div class="detials">
                                    <p>Next Post</p>
                                    <a href="{{route('post.show', $next->id)}}"><h4>{{substr($next->title, 0, 20)}}</h4></a>
                                </div>
                                <div class="arrow">
                                    <a href="{{route('post.show', $next->id)}}"><span class="lnr text-white lnr-arrow-right"></span></a>
                                </div>
                                @if($next->image)	
                                    <div class="thumb">
                                        <a href="{{route('post.show', $next->id)}}"><img height="60px" class="img-fluid" src="{{ asset('images/'.$next->image) }}" alt=""></a>
                                    </div>
                                @endif									
                                @endif									
                            </div>
                    </div>
                </div>
                @if ($comments)
                    <div class="comments-area">
                        <h4>{{$countCmt}} Comments</h4>
                        @foreach ($comments as $row)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            @if ($row->image)
                                                <img src="{{ asset('images/'. $row->image) }}" alt="">
                                            @else 
                                                <img src="{{ asset('assets/img/blog/c1.jpg') }}" alt="">
                                            @endif 
                                        </div>
                                        <div class="desc">
                                            <h5><a href="{{route('blog')}}?auth={{$post->user_id}}">{{$row->name}}</a></h5>
                                            <p class="date">{{$row->updated_at}}</p>
                                            <p class="comment">{{$row->content}}</p>
                                        </div>
                                    </div>
                                    <div class="reply-btn">
                                        <button class="btn-reply text-uppercase btn">reply</button>
                                        <input type="hidden" value="{{$row->id}}"> 
                                    </div>
                                </div>
                            </div>
                            @if ($row->children)
                                @foreach ($row->children as $children)
                                    <div class="comment-list left-padding">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    @if ($children->image)
                                                        <img src="{{ asset('images/'. $children->image) }}" alt="">
                                                    @else 
                                                        <img src="{{ asset('assets/img/blog/c1.jpg') }}" alt="">
                                                    @endif 
                                                </div>
                                                <div class="desc">
                                                    <h5><a href="{{route('blog')}}?auth={{$children->user->id}}">{{$children->user->name}}</a></h5>
                                                    <p class="date">{{$children->updated_at}}</p>
                                                    <p class="comment">{{$children->content}}</p>
                                                </div>
                                            </div>
                                            <div class="reply-btn">
                                                <button class="btn-reply text-uppercase btn">reply</button>
                                                <input type="hidden" value="{{$row->id}}"> 
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif                                           				
                        @endforeach 
                    </div>
                @endif 
                <div id="commentForm" class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form action="{{route('comment.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="content" placeholder="Messege" 
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <input type="hidden" name="user_id" value="@if(Auth::user()) {{Auth::user()->id}} @endif">
                            <input type="hidden" name="parent_id" id="parentIdReply">
                        </div>
                        <button type="submit" class="btn primary-btn primary_btn">Post Comment</button>	
                    </form>
                </div>
            </div>
            @include('frontend.layouts.blog_right_sidebar')
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@include('frontend.layouts.footer_area')