@extends('layout._master')
@section('title')
Log in
@stop
@section('content')
<h1>Log in</h1>
{{ Form::open(array('url' => '/user/login')) }}
{{ Form::label('email') }}
{{ Form::text('email','mensah33@gmail.com') }}
{{ Form::label('password') }} (bety2626)
{{ Form::password('password') }}
{{ Form::submit('Submit') }}
{{ Form::close() }}
@stop