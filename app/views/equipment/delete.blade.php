
@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>Equipment</h1>
    </div>

    <!---<div class="panel panel-default">-->
   <!--  <div class="panel-body">
    <a href="{{ action('EquipmentController@getCreate') }}" class="btn btn-primary">Create equipment</a>
    </div> -->

<h1><small>Are you sure that you want to destroy this  equipment entry?</small></h1>


 {{Form::open(['method' => 'DELETE', 'action' => ['EquipmentController@postDelete', $equipment->id]]) }}
            <a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
    {{ Form::close() }}
@stop






   {{---- EDIT -----}}
    {{ Form::open(array('url' => '/equipment/edit')) }}



<div>
        {{---- DELETE -----}}
        {{ Form::open(array('url' => '/book/delete')) }}
            {{ Form::hidden('id',$book['id']); }}
            <button onClick='parentNode.submit();return false;'>Delete</button>
        {{ Form::close() }}
    </div>

<div>
        {{---- DELETE -----}}
        {{ Form::open(array('url' => '/$equipment/delete')) }}
            {{ Form::hidden('id',$equipment['id']); }}
            <button onClick='parentNode.submit();return false;'>Delete</button>
        {{ Form::close() }}
    </div>
