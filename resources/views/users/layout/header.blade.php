<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">Push Him</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#">About</a></li>
            <li><a href="#">Top 100 players</a></li>
        </ul>

        @if (!Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ url('/facebook') }}">
                        <i class="fa fa-facebook fa-1x"> </i>  Login with Facebook
                    </a>
                </li>
            </ul>
            <br>
        @else
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <span class="title">{{ Auth::user()->name }}</span>
                </div>
                <ul class="list-group" id="contact-list">
                    <li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="{{ Auth::user()->fb_image }}" alt="{{ Auth::user()->name }}" class="img-responsive img-circle" />
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <span class="name">{{ Auth::user()->name }}</span><br>
                            <span class="name">{{ Auth::user()->email }}</span><br>
                            <div class="myBest">Your Record <span>{{ $score }}</span></div>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>