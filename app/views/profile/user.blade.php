extends('layout.main')

@section('content')

    <p>{{ e($user->username) }} ({{ e($user->email) }})</p>



<!--{{ Form::open() }}


Username:
{{
    Form::text( 'username', e($user->username), [
    'class'=>'asif-khan'
] )
}}

<br/>

Email:
{{
    Form::email( 'email', e($user->email) )
}}

{{ Form::close() }}-->


@stop

@extends("layout")
@section("content")
<h2>Hello {{ Auth::user()->username }}</h2>
<p>Welcome to your sparse profile page.</p>
@stop