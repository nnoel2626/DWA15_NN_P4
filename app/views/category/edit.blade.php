@extends('layout.main')
@section('title')
Edit Category
@stop
@section('content')


{{ Form::model($category, ['method' => 'post', 'action' => ['CategoryController@postEdit', $category->id]]) }}
<h2>Update: {{ $category->name }}</h2>

<div class="panel panel-default">
{{ Form::label('name', 'category Name') }}
{{ Form::text('name') }}
</div>
{{ Form::submit('Update') }}
{{ Form::close() }}

{{---- DELETE -----}}
{{ Form::open(['method' => 'DELETE', 'action' => ['CategoryController@postDelete', $category->id]]) }}
<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
{{ Form::close() }}
@stop