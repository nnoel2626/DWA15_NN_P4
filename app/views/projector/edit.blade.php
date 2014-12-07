@extends('layout.main')


@section('content')

 <div class="page-header">
        <h1>Edit Projector </h1>
    </div>

    <form action="{{ action('ProjectorController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $projector->id}}">

        <div class="form-group">
            <label for="caption">Caption</label>
            <input type="text" class="form-control" name="caption" value="{{ $projector->caption }}" />
        </div>

        <div class="form-group">
            <label for="path">Path</label>
            <input type="text" class="form-control" name="path" value="{{ $projector->path }}" />
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" name="brand" value="{{ $projector->brand }}" />
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" name="model" value="{{ $projector->model }}" />
        </div>
        <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" class="form-control" name="serial_number" value="{{ $projector->serial_number}}" />
        </div>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('ProjectorController@index') }}" class="btn btn-link">Cancel</a>
    </form>

@stop

