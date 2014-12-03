
@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>Tripod</h1>
    </div>

    <!---<div class="panel panel-default">-->
    <div class="panel-body">
    <a href="{{ action('TripodController@create') }}" class="btn btn-primary">Create Tripod</a>
    </div>

<h1><small>Are you sure that you want to destroy this  tripod entry?</small></h1>

<form action="{{ action('TripodController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="tripod" value="{{ $tripod->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('TripodController@index') }}" class="btn btn-default">No way!</a>
    </form>



@stop

