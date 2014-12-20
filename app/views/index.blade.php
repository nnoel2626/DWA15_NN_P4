@extends('layout._master')
@section('title')



Welcom to MTS Equipment Rental
@stop
@section('head')
@stop
@section('content')
{{ Form::open(array('url' => '/equipment/index', 'method' => 'GET')) }}
{{ Form::label('query','Search') }}
{{ Form::text('query'); }}
{{ Form::submit('Search'); }}
{{ Form::close() }}
@stop