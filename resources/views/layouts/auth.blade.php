<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="http://pluspng.com/img-png/favicon-png--192.png"/>
    <title>Koperca</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/3.3/examples/dashboard/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url('/')}}">Koperca</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            @if ((empty(Auth::user()->name))&&(empty(Auth::guard('admin')->user()->name)))
              @php
                $name = "";
                $l = "logout";
              @endphp
            @elseif (empty(Auth::user()->name))
              @php
                $name = Auth::guard('admin')->user()->name;
                $l = "admin.logout";
              @endphp
            @else
              @php
                $name = Auth::user()->name;
                $l = "logout";
              @endphp
            @endif

            <li><a href="#">{{$name}}</a></li>
            <li>
              <a href="{{route($l)}}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </a>
              <form id="logout-form" action="{{route($l)}}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="">Profile</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="{{route('kontrak.index')}}">Kontrak</a></li>
            <li><a href="{{route('biaya.index')}}">Biaya</a></li>
            <li><a href="{{route('penerimaan.index')}}">Penerimaan</a></li>
          </ul>
        </div>
        {{--end here--}}
        @yield('content')
        {{--start again here--}}
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
  </body>
</html>
