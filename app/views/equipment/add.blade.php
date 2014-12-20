@extends('layout.main')
@section('title')
Add a new equipment
@stop
@section('content')
<h1>Add a new equipment</h1>

{{ Form::open(array('url' => '/equipment/create')) }}
{{ Form::label('brand','Brand') }}
{{ Form::text('brand'); }}

{{ Form::label('model','Model') }}

{{ Form::text('model'); }}

{{ Form::label('image_path','Image image') }}
{{ Form::text('image'); }}



@foreach($category as $id => $category)
{{ Form::checkbox('categorys[]', $id); }} {{ $category }}
@endforeach
{{ Form::submit('Add'); }}
{{ Form::close() }}
@stop