@extends('layout.main')

@section('title')
     Login_page
@stop

@section('content')

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
    {{ Form::submit('Login', array('class'=>'btn btn-primary'))}}   </div>


    {{ Form::close() }}


@stop



