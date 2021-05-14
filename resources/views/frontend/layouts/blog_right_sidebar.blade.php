<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
            <form action="{{ route('blog') }}" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search Posts">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="lnr lnr-magnifier"></i></button>
                    </span>
                </div>
            </form>
            <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget author_widget">
            @if($user)
                @if ($user->image !== null)
                    <a href="{{ route('blog') }}?auth={{ $user->id }}"><img width="200px" height="200px"
                            class="author_img rounded-circle" src="{{ asset('images/' . $user->image) }}"
                            alt="" /></a>
                @endif
                <a href="{{ route('blog') }}?auth={{ $user->id }}">
                    <h4>{{ substr($user->name, 0, 20) }}</h4>
                </a>
                <p>{{ substr($user->title, 0, 30) }}</p>
                <div class="social_icon">
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-github"></i></a>
                    <a href=""><i class="fa fa-behance"></i></a>
                </div>
                <p>{{ substr($user->title, 0, 200) }}</p>
                <div class="br"></div>
            @endif
        </aside>
        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title">Popular Posts</h3>
            @if ($posts->count() > 0)
                @foreach ($posts as $row)
                    <div class="media post_item">
                        @if ($row->image !== null)
                            <img width="100" height="60px" src="{{ asset('images/' . $row->image) }}" alt="post" />
                        @else
                            <img width="100" height="60px" src="{{ asset('images/1618897571-abc.png') }}" alt="post" />
                        @endif
                        <div class="media-body">
                            <a href="{{ route('post.show', $row->id) }}">
                                <h3>{{ substr($row->title, 0, 25) }}</h3>
                            </a>
                            <p>02 Hours ago</p>
                            <p>{{ now()->diffForHumans($row->created_at) }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget ads_widget">
            <a href=""><img class="img-fluid" src="{{ asset('assets/img/blog/add.jpg') }}" alt=""></a>
            <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Post Catgories</h4>
            <ul class="list cat-list">
                @if ($categories->count() > 0)
                    @foreach ($categories as $row)
                        <li>
                            <a href="{{ route('blog') }}?cate={{ $row->id }}"
                                class="d-flex justify-content-between">
                                <p>{{ $row->cat_name }}</p>
                                <p>{{ count($row->posts) }}</p>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
            <div class="br"></div>
        </aside>
        <aside id="linkflashsendmail" class="single-sidebar-widget newsletter_widget">
            <h4 class="widget_title">Newsletter</h4>
            <p>
                Here, I focus on a range of items and features that we use in life without
                giving them a second thought.
            </p>
            @include('layouts.flash-message')
            <form action="{{ route('sendemail') }}" method="post" enctype="multipart/form-data">
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
                <li><a href="">Technology</a></li>
                <li><a href="">Fashion</a></li>
                <li><a href="">Architecture</a></li>
                <li><a href="">Fashion</a></li>
                <li><a href="">Food</a></li>
                <li><a href="">Technology</a></li>
                <li><a href="">Lifestyle</a></li>
                <li><a href="">Art</a></li>
                <li><a href="">Adventure</a></li>
                <li><a href="">Food</a></li>
                <li><a href="">Lifestyle</a></li>
                <li><a href="">Adventure</a></li>
            </ul>
        </aside>
    </div>
</div>
<div class="modal fade" id="mailPopupSuccess" tabindex="-1" role="dialog" aria-labelledby="mailPopupSuccessTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
            </div>
            <div class="modal-body">
                Sign up for our newsletter successfully!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- mailPopupError -->
<div class="modal fade" id="mailPopupError" tabindex="-1" role="dialog" aria-labelledby="mailPopupErrorsTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
            </div>
            <div class="modal-body">
                Our newsletter registration was unsuccessful!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
