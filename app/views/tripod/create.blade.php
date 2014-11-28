@extends('layout.main')

@section('title')
    Add a new Tripod
@stop


@section('content')

       {{ Form::open ( array ('url' => '/tripod.store')) }}

                    <div class="form-group"> {{ Form::label('brand', 'Brand') }}
                    {{ Form::text('brand'); }} </div>

                    <div class="form-group">{{ Form::label('model','Model') }}
                     {{ Form::text('model'); }} </div>

                    <div class="form-group"> {{ Form::label('serial_number','Serial_number') }}
                    {{ Form::text('serial_number'); }} </div>

                    <div class="btn btn-primary" >
                    {{ Form::submit('create'); }}</div>

                    <div class="btn btn-link" >
                    <a href="{{ action ('TripodController@index') }}" class="btn btn-link">Cancel</a>
                    </div>

         {{ Form::close() }}




@stop
