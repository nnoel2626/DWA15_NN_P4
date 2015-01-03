@extends('layout._master')

@section('content')
    <div class="page-header">
        <h1>All Category<small>Gotta catch 'em all!</small></h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('CategoryController@getCreate') }}" class="btn btn-primary">Create Category</a>
        </div>
    </div>

   
<h1><small>Are you sure that you want to destroy this category entry?</small></h1>

{{---- DELETE -----}}
{{ Form::open(array('url' => '/category/delete')) }}
{{ Form::hidden('id',$category['id']); }}
<button onClick='parentNode.submit();return false;'>Delete</button>
{{ Form::close() }}

@stop
