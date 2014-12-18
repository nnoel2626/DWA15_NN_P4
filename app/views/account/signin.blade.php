@extends('layout.main')


@section('title')
     Login_page
@stop

@section('head')
    {{ HTML::style('css/front-page.css') }}
@stop


@section('content')


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

            <a href="{{ URL::route('account-create') }}">Create Account</a><span>|

           <a href="{{ URL::route('account-forgot-password') }}">Forgot Password</a></span><br>

            </section>


   </main>

@stop



