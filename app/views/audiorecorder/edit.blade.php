@extends('layout.main')


@section('content')

 <div class="page-header">
        <h1>Edit Audiorecorder</h1>
    </div>

    <form action="{{ action('AudiorecorderController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $audiorecorder->id}}">

        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" name="brand" value="{{ $audiorecorder->brand }}" />
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" name="model" value="{{ $audiorecorder->model }}" />
        </div>
        <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" class="form-control" name="serial_number" value="{{ $audiorecorder->serial_number}}" />
        </div>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('AudiorecorderController@index') }}" class="btn btn-link">Cancel</a>
    </form>

@stop

