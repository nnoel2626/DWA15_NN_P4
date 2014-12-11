
@extends('layout.main')

@section('content')
    <div class="page-header">
          <h1>Delete a projector from the library</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('ProjectorController@create') }}" class="btn btn-primary">Add Projector</a>
        </div>
    </div>

<h1><small>Are you sure that you want to destroy this projector entry?</small></h1>

<form action="{{ action('ProjectorController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="projector" value="{{ $projector->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('ProjectorController@index') }}" class="btn btn-default">No way!</a>
    </form>
@stop
