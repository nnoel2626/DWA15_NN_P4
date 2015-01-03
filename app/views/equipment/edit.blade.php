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
{{ Form::text('brand', $equipment['brand']); }}
</div>
<div class='form-group'>
{{ Form::label('model','model') }}
{{ Form::text('model',$equipment['model']); }}
</div>
<div class='form-group'>
{{ Form::label('serial_number','serial_number') }}
{{ Form::text('serial_number',$equipment['serial_number']); }}
</div>
<div class='form-group'>
{{ Form::label('image_path','image_path') }}
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

@stop