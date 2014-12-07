
@extends('layout.main')

@section('content')
    <div class="page-header">
               <h1>Delete a microphone from the library</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('MicrophoneController@create') }}" class="btn btn-primary">Create Microphone</a>
        </div>
    </div>


<h1><small>Are you sure that you want to destroy this microphone entry?</small></h1>

<form action="{{ action('MicrophoneController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="microphone" value="{{ $microphone->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('MicrophoneController@index') }}" class="btn btn-default">No way!</a>
    </form>


@stop
