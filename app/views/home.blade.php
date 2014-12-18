@extends('layout.main')

@section('head')
    {{ HTML::style('css/front-page.css') }}
@stop


@section('content')
<!--    Home.-->
    @if(Auth::check())
        <p>Hello, {{ Auth::user()->username }}</p>
    @else
    <div class = "text-login">
        <h2> Welcom to MTS Equipment Rental</h2>
      <h3>Please create an account in order to sign-out equipment</h3>
        <h5>You're not signed in</h5>
    </div>
    @endif

        <div class = "nav-login">
           <br> <li><a href="{{ URL::route('account-sign-in') }}">Sign in</a></li><br>
            <li class="nav-divider"></li>
            <li><a href="{{ URL::route('account-create') }}">Create Account</a></li><br>
            <li class="nav-divider"></li>
            <li><a href="{{ URL::route('account-forgot-password') }}">Forgot Password</a></li><br>
        </div>
@stop
