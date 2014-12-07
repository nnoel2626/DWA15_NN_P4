
@extends('layout.main')

@section('content')
    <div class="page-header">
         <h1>Delete an videocam from the library</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('VideocamController@create') }}" class="btn btn-primary">Create Videocam</a>
        </div>
    </div>

   <h1><small>Are you sure that you want to destroy this  videocam entry?</small></h1>

<form action="{{ action('VideocamController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="videocam" value="{{ $videocam->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('VideocamController@index') }}" class="btn btn-default">No way!</a>
    </form>

@stop
