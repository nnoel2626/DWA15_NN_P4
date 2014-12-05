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
</head>
<body>

<header>


    <div class="container">

        <h1>MTS A/V Equipment Rental</h1>
        <p>Please, create an account  in order to sign-out equipment</p>
    </div>

</header>


<main class="container">

 @include('layout.main_nav')

  @include('layout.navigation')

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




