@extends('users.layout.layout')

@section('content')

    <div class="row">
        <div class="col-sm-1 col-md-1"></div>
        <div class="col-sm-6 col-md-6 col-lg-5 pushContainer">
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
                                    <span class="name" style="display: block; padding: 0px;">{{ $leader->user->name }}</span>
                                    <span class="name" style="width:100%;">{{ @$leader->user->email }}</span>
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