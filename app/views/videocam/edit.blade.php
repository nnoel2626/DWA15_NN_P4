@extends('layout.main')


@section('content')

 <div class="page-header">
        <h1>Edit Videocam</h1>
    </div>

    <form action="{{ action('VideocamController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $videocam->id}}">

        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" name="brand" value="{{ $videocam->brand }}" />
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" name="model" value="{{ $videocam->model }}" />
        </div>
        <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" class="form-control" name="serial_number" value="{{ $videocam->serial_number}}" />
        </div>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('VideocamController@index') }}" class="btn btn-link">Cancel</a>
    </form>

@stop

