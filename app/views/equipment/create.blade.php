@extends('layout.main')
@section('title')
Add a new equipment
@stop
@section('content')
<h1>Add a new equipment</h1>

{{ Form::open(array('url' => '/equipment.postCreate')) }}


{{ Form::label('name','Name') }}
{{ Form::text('name'); }}

{{ Form::label('brand','Brand') }}
{{ Form::text('brand'); }}

{{ Form::label('model','Model') }}

{{ Form::text('model'); }}

{{ Form::label('serial_number','serial number ') }}
{{ Form::text('image'); }}

{{ Form::label('image_path','Image image') }}
{{ Form::text('image'); }}


@foreach($categories as $id => $category)
<ul>
<li>{{ Form::checkbox('categories[ ]', $id); }} {{ $category }}</li>
</ul>
@endforeach

{{ Form::submit('Add'); }}
{{ Form::close() }}
@stop