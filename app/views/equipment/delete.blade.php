

@extends('layout._master')

@section('content')
<div class="page-header">
<h1>Equipment</h1>
</div>
<div class="panel panel-default">
<div class="panel-body">
<a href="{{ action('EquipmentController@getCreate') }}" class="btn btn-primary">Create Equipment</a>
</div>
<h1><small>Are you sure that you want to destroy this equipment entry?</small></h1>
<div>
{{---- DELETE -----}}
{{ Form::open(array('url' => '/equipment/delete')) }}
{{ Form::hidden('id',$equipment['id']); }}
<button onClick='parentNode.submit();return false;'>Delete</button>
{{ Form::close() }}
</div> -->



@stop



<!-- <form action="{{ action('EquipmentController@postDelete') }}" method="post" role="form">
<input type="hidden" name="equipment" value="{{ $equipment->id }}" />
<input type="submit" class="btn btn-danger" value="Yes" />
<a href="{{ action('EquipmentController@getIndex') }}" class="btn btn-default">No way!</a>
</form> -->