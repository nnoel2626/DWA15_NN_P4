@extends('layout.main')

@section('title')
    Add a new Microphone
@stop


@section('content')
        <div class="page-header">
                <h1>Add a new Microphone to library </h1>
        </div>

        <form action="{{ action ('MicrophoneController@postCreate') }}" method="post" role="form">

        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" name="brand" />
        </div>

        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" name="model" />
        </div>

            <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" class="form-control" name="serial_number" />
        </div>


        </div>
        <input type="submit" value="Create" class="btn btn-primary" />

        <a href="{{ action('MicrophoneController@index') }}" class="btn btn-link">Cancel</a>

    </form>
@stop

