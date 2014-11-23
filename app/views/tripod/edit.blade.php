@extends('layout.main')
@section('title')
Edit
@stop
@section('head')
@stop
@section('content')
                    <h1>Edit</h1>

                    {{---- EDIT -----}}
                    {{ Form::model($tripod, ['method'=> 'PUT', 'action'=> [ 'TripodController@store', $tripod->id]])  }}

                   <h2>update: {{ $tripod->name}}</h2>

                    <div class='form-group'>
                    {{ Form::label('brand','Brand') }}
                    {{ Form::text('brand')}}
                    </div>
                    <div class='form-group'>
                    {{ Form::label('model', 'Model') }}
                    {{ Form::select('model') }}
                    </div>
                    <div class='form-group'>
                    {{ Form::label('serial_number','Serial_number') }}
                    {{ Form::text('serial_number') }}
                    </div>
                    <div class="btn btn-primary" >
                    {{ Form::submit('Save'); }}<div>

                    {{ Form::close() }}
@stop

