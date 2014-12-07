
@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>Delete a Mac from the library</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('MacController@create') }}" class="btn btn-primary">Create Mac</a>
        </div>
    </div>
<h1><small>Are you sure that you want to destroy this  mac entry?</small></h1>

<form action="{{ action('MacController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="mac" value="{{ $mac->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('MacController@index') }}" class="btn btn-default">No way!</a>
    </form>


@stop
