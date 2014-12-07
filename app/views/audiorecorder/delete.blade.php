
@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>Delete an audiorecorder from the library</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('AudiorecorderController@create') }}" class="btn btn-primary">Create Audiorecorder</a>
        </div>
    </div>

   <h1><small>Are you sure that you want to destroy this  audiorecorder entry?</small></h1>

<form action="{{ action('AudiorecorderController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="audiorecorder" value="{{ $audiorecorder>id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('AudiorecorderController@index') }}" class="btn btn-default">No way!</a>
    </form>
@stop
