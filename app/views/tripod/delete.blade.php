
@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>All Tripods<small>Gotta catch 'em all!</small></h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('TripodController@create') }}" class="btn btn-primary">Create Game</a>
        </div>
    </div>
<h3><small>Are you sure that you want tp destroy this  tripod entry?</small></h1>
{{ Form::open(['method' => 'DELETE', 'action' => ['TripodController@handleDelete', $tripod->id]]) }}
    <a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
    <a href="{{ action('TripodController@index') }}" class="btn btn-link">Cancel</a>
{{ Form::close() }}

@stop
