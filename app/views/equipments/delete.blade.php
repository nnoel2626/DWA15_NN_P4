@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Delete {{ $equipment->title }} <small>Are you sure?</small></h1>
    </div>
    <form action="{{ action('EquipmentController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="game" value="{{ $game->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('GamesController@index') }}" class="btn btn-default">No way!</a>
    </form>
@stop
