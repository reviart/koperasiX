<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="http://pluspng.com/img-png/favicon-png--192.png"/>
        <title>Koperca</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
          <div class="top-right links">
            @if ((empty(Auth::user()->id))&&(empty(Auth::guard('admin')->user()->id)))
              <a href="{{ route('login') }}">Login operator</a>
              <a href="{{ route('admin.login') }}">Login admin</a>
            @elseif (empty(Auth::user()->id))
              <a href="{{ route('login') }}">Login operator</a>
              <a href="{{ route('admin.dashboard') }}">Home(admin)</a>
            @else
              <a href="{{ route('operator.dashboard') }}">Home(operator)</a>
              <a href="{{ route('admin.login') }}">Login admin</a>
            @endif
          </div>

            <div class="content">
                <div class="title m-b-md">
                    Data Kontrak Indonesia Power - KOPERCA
                </div>
                {{--
                <div class="links">
                  <a href="{{ route('admin.login') }}">Login admin</a>
                  <a href="{{ route('admin.register') }}">Register admin</a>
                </div>
                --}}
            </div>
        </div>
    </body>
</html>
