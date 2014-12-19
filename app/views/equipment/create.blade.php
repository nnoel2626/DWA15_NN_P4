@extends('layout.main')
@section('title')
Add a new equipment
@stop
@section('content')
<h1>Add a new equipment</h1>



<form action="{{ action('EquipmentController@postCreate') }}" method="post" role="form">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" />
        </div>

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
         <div class="form-group">
            <label for="image_path">Image path</label>
            <input type="text" class="form-control" name="image_path" />
        </div>

            @foreach($categories as $id => $category)
            <ul>
            <li>{{ Form::checkbox('categories[ ]', $id); }} {{ $category }}</li>
            </ul>
            @endforeach


        <input type="submit" value="Create" class="btn btn-primary" />

        <a href="{{ action('EquipmentController@getIndex') }}" class="btn btn-link">Cancel</a>
    </form>




@stop


