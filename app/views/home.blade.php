@extends('layout.main')

@section('head')
    {{ HTML::style('css/front-page.css') }}
@stop

@section('content')
<!--    Home.-->
    @if(Auth::check())
        <p>Hello, {{ Auth::user()->username }}</p>
    @else
    <div class = "p-login"
      <p>Please, create an account  in order to sign-out equipment</p>
        <p>You're not signed in</p></div>
    @endif

<main class="container">
            <section id="content">
            <h2 class="form-signin-heading">Please Login</h2>

            {{ Form::open(array ('account-sign-in-post')) }}

            {{ Form::text('email', null, array( 'placeholder' => 'Email Address')) }}

            @if($errors->has('email')) {{ $errors ->first('email') }}@endif

            {{ Form::password('password', array( 'placeholder'=>'Password')) }}

            @if($errors->has('password')){{ $errors ->first('password') }} @endif

            {{ Form::submit('Login', array('class'=>'button'))}}

            {{ Form::close() }}

            <a href="{{ URL::route('account-create') }}">Create Account</a><span>

           <a href="{{ URL::route('account-forgot-password') }}">Forgot Password</a></span>

            </section>


   </main>

@stop