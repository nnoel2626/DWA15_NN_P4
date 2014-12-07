@extends('layout.main')


@section('content')

 <div class="page-header">
        <h1>Edit Mac</h1>
    </div>

    <form action="{{ action('MacController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $mac->id}}">

        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" name="brand" value="{{ $mac->brand }}" />
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" name="model" value="{{ $mac->model }}" />
        </div>
        <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" class="form-control" name="serial_number" value="{{ $mac->serial_number}}" />
        </div>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('MacController@index') }}" class="btn btn-link">Cancel</a>
    </form>

@stop

