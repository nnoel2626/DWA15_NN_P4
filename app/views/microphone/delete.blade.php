
@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>All Tripods<small>Gotta catch 'em all!</small></h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('TriposController@create') }}" class="btn btn-primary">Create Game</a>
        </div>
    </div>

   
To get around this, you'll have to create a mini-form with the DELETE method. Inside the form, you can embed a link that will submit the form (shown here with inline JS for simplicty):

{{ Form::open(['method' => 'DELETE', 'action' => ['TagController@destroy', $tag->id]]) }}
    <a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
{{ Form::close() }}

@stop
