@extends('layout._master')

@section('name')
Edit
@stop

@section('head')
@stop
@section('content')


<h1>Edit</h1>
<h2>{{{ $equipment['name'] }}}</h2>
{{---- EDIT -----}}
{{ Form::open(array('url' => '/equipment/edit')) }}
{{ Form::hidden('id',$equipment['id']); }}
<div class='form-group'>
{{ Form::label('name','name') }}
{{ Form::text('name',$equipment['name']); }}
</div>
<div class='form-group'>
{{ Form::label('brand', 'brand') }}
{{ Form::text('brand', $equipment->brand); }}
</div>
<div class='form-group'>
{{ Form::label('model','model') }}
{{ Form::text('model',$equipment['model']); }}
</div>
<div class='form-group'>
{{ Form::label('serial_number','serial_number Image URL') }}
{{ Form::text('serial_number',$equipment['serial_number']); }}
</div>
<div class='form-group'>
{{ Form::label('image_path','Image Link') }}
{{ Form::text('image_path',$equipment['image_path']); }}
</div>
<div class='form-group'>
@foreach($categories as $id => $category)
{{ Form::checkbox('categories[]', $id, $equipment->categories->contains($id)); }} {{ $category }}
&nbsp;&nbsp;&nbsp;
@endforeach
</div>
{{ Form::submit('Save'); }}
{{ Form::close() }}
<div>
{{---- DELETE -----}}
{{ Form::open(array('url' => '/equipment/destroy')) }}
{{ Form::hidden('id',$equipment['id']); }}
<button onClick='parentNode.submit();return false;'>Delete</button>
{{ Form::close() }}
</div>
@stop

<!-- <h1>Edit</h1>
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

 -->