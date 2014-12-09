
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
                {{ HTML::style('css/front-page.css') }}
</head>
<body>

<header>
        <h1>MTS A/V Equipment Rental</h1>
        <p>Please, create an account  in order to sign-out equipment</p>
</header>

<main class="container">
    <section id="content">
<h2 class="form-signin-heading">Please Login</h2>

     {{ Form::open(array ('account-sign-in-post')) }}

    <div class="form-group">
    {{ Form::text('email', null, array( 'placeholder' => 'Email Address')) }}

    @if($errors->has('email'))

    {{ $errors ->first('email') }}

    @endif </div>

<div class="form-group">
    {{ Form::password('password', array( 'placeholder'=>'Password')) }}

    @if($errors->has('password'))

    {{ $errors ->first('password') }}

    @endif   </div>

    <div class="form-group">
    {{ Form::submit('Login', array('class'=>'button'))}}   </div>


    {{ Form::close() }}

</section><!-- content -->


   </main>

<footer>

        &copy; {{ date('Y') }} AV rental  Web App |
    </div>
</footer>

</body>
</html>


