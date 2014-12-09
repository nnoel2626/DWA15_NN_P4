<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>MTS A/V Equipment Rental</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    {{ HTML::style('css/style.css') }}

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

     @yield('head')
</head>
<body>

<header>
    <a href='/'><img class='logo' src='/images/harvard_logo.jpg' alt='Harvard logo'></a>
        <h1>MTS A/V Equipment Rental</h1>
        <div class="log-in">
            @include('layout.navigation')
        </div>
</header>

        <div class="top-container">
        @include('layout.main_nav')
        </div>

        <main class="container">
        @if(Session::has('global'))
        <p>{{ Session::get('global') }}</p>
        @endif

        @yield('content')

</main>

<footer>

        &copy; {{ date('Y') }} AV rental  Web App |
    </div>
</footer>

</body>
</html>




