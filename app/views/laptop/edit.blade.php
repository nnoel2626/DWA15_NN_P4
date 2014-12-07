@extends('layout.main')


@section('content')

 <div class="page-header">
        <h1>Edit Laptop <small>Go on, mark it complete!</small></h1>
    </div>

    <form action="{{ action('LaptopController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $laptop->id}}">

        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" name="brand" value="{{ $laptop->brand }}" />
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" name="model" value="{{ $laptop->model }}" />
        </div>
        <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" class="form-control" name="serial_number" value="{{ $laptop->serial_number}}" />
        </div>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('LaptopController@index') }}" class="btn btn-link">Cancel</a>
    </form>

@stop

