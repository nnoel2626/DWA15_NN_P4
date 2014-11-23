create videocam


@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Add Equipment <small>and someday finish it!</small></h1>
    </div>

    <form action="{{ action('EquipmentController@handleAdd') }}" method="post" role="form">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" />
        </div>
        <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" class="form-control" name="publisher" />
        </div>
        <div class="checkbox">
            <label for="complete">
                <input type="checkbox" name="complete" /> Complete?
            </label>
        </div>
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('GamesController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop
