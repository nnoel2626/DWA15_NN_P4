@extends('layout._master')

@section('title')
Create a new category
@stop
@section('content')
<div class="page-header">
<h2>Create a category</h2>
</div>
<div class="panel panel-default">
{{ Form::open(array('action' => 'CategoryController@update')) }}
</div>
<div class="panel panel-default">
{{ Form::label('name','category Name') }}
{{ Form::text('name') }}
</div>
<div class="panel panel-default">
{{ Form::label('created_at','created_at') }}
{{ Form::text('created_at') }}
</div>
<div class="panel panel-default">
{{ Form::label('updated_at','Updated_a') }}
{{ Form::text('updated_at') }}
</div>
<br>
<div class="panel panel-default">
{{ Form::submit('Add category')}}
</div>
{{ Form::close() }}
@stop