<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Asset -->
    <link rel="shortcut icon" href="https://lh3.googleusercontent.com/ogw/ADea4I799nKqwIc1BDQuCvfacICu8VxE7eD6-VCQB8a3=s83-c-mo" type="image/png" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-site.css') }}" rel="stylesheet">
    <!-- External source-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <!--<title> config('app.name', 'Laravel') </title> -->
    <!-- For Statistic-->
    <script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.0.0/themes/dark_earth.min.js" type="text/javascript"></script>
    <title>TGLS-G2</title>
</head>
<body>
<style>
    body {
        background: linear-gradient(0.8turn, #99EDC3, skyblue, lavender);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        margin-bottom: 100px;
    }
    h1, p {
        background-color: rgba(92, 25, 186, 0.3);
        color: #eff;
        text-align: center;
        resize: both;
    }
    h2 {
        text-align: center;
    }
    a {
        text-decoration: none;
    }
    #tabledesign {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    #tabledesign td,
    #tabledesign th {
        border: 1px solid #ddd;
        padding: 8px;
    }
    #tabledesign tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    #tabledesign tr:hover {
        background-color: #ddd;
    }
    #tabledesign th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-auto">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="https://bit.ly/3uomW1Q" alt="" width="25" height="25" class="d-inline-block align-text-top"> TGLS-G2
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01"><!-- navbarNavDropdown -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @auth
                        @if(Auth::user()->role == 1)                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Posting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin') }}">Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create') }}">Create Post</a>
                        </li>
                        @elseif(Auth::user()->role == 4)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Posting</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create') }}">Create Post</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Posting</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.list') }}">Management</a>
                        </li>
                        @endif
                        @endauth
                    </ul>
                    <ul class="nav navbar-nav">
                        @if(Auth::guest())
                        
                        <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        @else
                        <li><a class="nav-link" href="{{ __('/profile') }}/{{ Auth::user()->id }}/">
                            <i class="fa fa-address-card-o" style="font-size:18px"></i>
                            {{ Auth::user()->name }} </a></li>
                        <li><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <br><br>
</body>
<footer class="w3-container footer-auto"> 
    <!-- <div class="d-flex justify-content-center align-items-center">   
    <button class="btn-a2 btn-disable">« 1st</button>
    <div class="paginated">
        <a href="#">Prev &lt;</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">Next &gt;</a>
    </div>
    <button class="btn-a2">Last »</button>
    </div> -->
    <p style="color:#c3d7ff;">Copyright<i class="fa fa-copyright">2022</i> |
        <a href="#">Sitemap</a> | <a href="/toc">Terms & Conditions</a></p>
</footer>
</html>