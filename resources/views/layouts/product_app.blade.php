<!DOCTYPE html>
<html lang = "ja">
    
    <head>
        <meta charset = "utf-8">
        <meta http-equiv="X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content="width=device-width,initial-scale=1">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <title>@yield('title')</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script src="{{ asset('js/product_js.js') }}"></script>     
    </body>
</html>
