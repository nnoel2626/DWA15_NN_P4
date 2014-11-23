@extends('user._layouts.user')

@section('content')

<h1>Posts</h1>
{{ link_to_route('user.posts.create', 'Create new Post') }}

@if(count($posts))
    <ul>
    @foreach($posts as $post)
        <li>
            {{ link_to_route('user.posts.edit', $post->title, array($post->id)) }}
            {{ Form::open(array('route' => array('user.posts.destroy', $post->id), 'method' => 'delete', 'class' => 'destroy')) }}
            {{ Form::submit('Delete') }}
            {{ Form::close() }}
        </li>
    @endforeach
    </ul>
@endif

@stop