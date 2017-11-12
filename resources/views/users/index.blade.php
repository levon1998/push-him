@extends('users.layout.layout')

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-5 pushContainer">
            <div class="pushBlock">
                <div class="push">
                    <h2 class="pushCount">Click me</h2>
                </div>
            </div>
            <div class="time"><div class="timer"></div> seconds left</div>
            <div class="resaultAndShare">
                <div class="resault">Your result is <span></span></div>
                <div class="share">
                    <button type="button" class="btn btn-primary resetButton">Play Again</button>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-offset-1 col-sm-4">
            @if (!Auth::check())
                <a href="{{ url('/facebook') }}" class="btn btn-primary btn-block facebookButton">
                    <i class="icon-facebook"></i>    Login with Facebook
                </a><br>
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
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <span class="title">Leaders</span>
                </div>
                <ul class="list-group" id="contact-list">
                    @if ($leaders)
                        @foreach ($leaders as $leader)
                            <li class="list-group-item">
                                <div class="col-xs-12 col-sm-3">
                                    <img src="{{ $leader->user->fb_image }}" alt="{{ $leader->user->name }}" class="img-responsive img-circle" />
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <span class="name">{{ $leader->user->name }}</span>
                                    <span class="name">{{ @$leader->user->email }}</span>
                                    <div>Record <span>{{ $leader->score }}</span></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection