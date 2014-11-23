@extends('layout.main')

@section('content')
<!--    Home.-->
    @if(Auth::check())
        <p>Hello, {{ Auth::user()->username }}</p>
    @else
        <p>You're not signed in</p>
    @endif

@stop