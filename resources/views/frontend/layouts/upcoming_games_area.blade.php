
<!--================First Upcoming Games Area =================-->
<section class="upcoming_games_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2>Upcoming Games</h2>
                    <h1>Upcoming Games</h1>
                </div>
            </div>
        </div>
        <div class="row text-center">
            @foreach ($games as $game)
                <div class="col-lg-3 col-md-6">
                    <div class="new_games_item">
                        @if ($game->image !== null)
                            <img width="255px" height="340px" src="{{ asset('images/'.$game->image) }}" alt="">
                        @else
                            <img width="255px" height="340px" src="{{ asset('images/1618900850-Best Ps4 Games.png') }}" alt="">
                        @endif
                        <div class="upcoming_title">
                            <h3><a href="{{route('games')}}">{{ substr($game->name, 0, 20) }}</a></h3>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
</section>
<!--================End Upcoming Games Area =================-->
	