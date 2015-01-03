@extends('layout._master')

@section('title')
Add a new equipment
@stop
@section('content')

<h1>Add a new equipment</h1>

{{ Form::model(array('url' => '/equipment/create')) }}

{{ Form::label('name','Name') }}
{{ Form::text('name'); }}

{{ Form::label('brand','Brand') }}
{{ Form::text('brand'); }}

{{ Form::label('model','Model') }}
{{ Form::text('model'); }}

{{ Form::label('serial_number','serial_number') }}
{{ Form::text('serial_number'); }}

{{ Form::label('image_path','image_path') }}
{{ Form::text('image_path'); }}

@foreach($categories as $id => $category)
{{ Form::checkbox('categories[]', $id); }} {{ $category }}
@endforeach

{{ Form::submit('create'); }}
{{ Form::close() }}

@stop