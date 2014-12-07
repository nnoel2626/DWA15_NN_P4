@extends('layout.main')


@section('content')

 <div class="page-header">
        <h1>Edit Dungle</h1>
    </div>

    <form action="{{ action('DungleController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $dungle->id}}">

        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" name="brand" value="{{ $dungle->brand }}" />
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" name="model" value="{{ $dungle->model }}" />
        </div>
        <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" class="form-control" name="serial_number" value="{{ $dungle->serial_number}}" />
        </div>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('DungleController@index') }}" class="btn btn-link">Cancel</a>
    </form>

@stop

