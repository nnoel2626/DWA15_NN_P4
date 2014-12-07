
@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>Delete an dungle from the library</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('DungleController@create') }}" class="btn btn-primary">Create Dungle</a>
        </div>
    </div>


 <h1><small>Are you sure that you want to destroy this dungle entry?</small></h1>

<form action="{{ action('DungleController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="dungle" value="{{ $dungle>id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('DungleController@index') }}" class="btn btn-default">No way!</a>
    </form>
{{ Form::close() }}

@stop
