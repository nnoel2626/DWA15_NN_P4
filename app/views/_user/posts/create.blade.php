@extends('user._layouts.user')

@section('content')

<h1>Create Post</h1>
{{ Form::open(array('route' => 'user.posts.store')) }}
    @include('user.posts._partials.form')
{{ Form::close() }}
@stop