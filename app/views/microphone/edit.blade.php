@extends('layout.main')
@section('title')
    Edit Microphones
@stop

@section('content')
{{ Form::model ($microphone, array('action' => array('MicrophoneController@handleEdit', $microphone->id), 'method' => 'post')) }}
<h2>Update: {{ $microphone->name}}</h2>

<div class='form-group'>

{{ Form::text('id') }}
</div>

<div class='form-group'>
{{ Form::label('brand', 'Brand') }}
{{ Form::text('brand') }}
</div>

<div class='form-group'>
{{ Form::label('model', 'Model') }}
{{ Form::text('model') }}
</div>
<div class='form-group'>
{{ Form::label('serial_number', 'Serial Number') }}
{{ Form::text('serial_number') }}
</div>
{{ Form::submit('Update') }}
 {{ Form::close() }}

<a href="{{ action('MicrophoneController@index') }}" class="btn btn-link">Cancel</a>
@stop


