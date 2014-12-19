@extends('layout.main')

@section('title')
    Edit
@stop

@section('head')

@stop

@section('content')

    <h1>Edit</h1>

    <h2>{{{ $equipment['name'] }}}</h2>


<form action="{{ action('EquipmentController@postEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $equipment->id}}">
    <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $equipment->name }}" />
        </div>

        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" name="brand" value="{{ $equipment->brand }}" />
        </div>

        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" name="model" value="{{ $equipment->model }}" />
        </div>

        <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" class="form-control" name="serial_number" value="{{$equipment->serial_number}}" />
        </div>
           <div class="form-group">
            <label for="image_path">image_path</label>
            <input type="text" class="form-control" name="image_path" value="{{$equipment->image_path}}" />
        </div>

        <div class='form-group'>

            @foreach($categories as $id => $category)
                {{ Form::checkbox('$categories[]', $id, $equipment->$category->contains($id)); }} {{ $category}}
            @endforeach
        </div>

        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('EquipmentController@getIndex') }}" class="btn btn-link">Cancel</a>
    </form>



@stop

