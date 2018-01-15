<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:url"          content="{{ url()->full() }}" />
    <meta property="og:type"         content="article" />
    <meta property="og:title"        content="Beat the record with as much hits as possible" />
    <meta property="og:description"  content="It is harder than it seems, try once and you will never stop!" />
    <meta property="og:image"        content="{{ asset('images/fb_img.jpg') }}" />
    <title>Push Here</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
</head>
<body>
    <div class="container">
        @include('users.layout.header')
        @yield('content')
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58d664ca8ecc2ba6"></script>
</body>
</html>