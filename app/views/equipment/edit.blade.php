@extends('_master')

@section('title')
    Edit
@stop

@section('head')

@stop

@section('content')

    <h1>Edit</h1>
    <h2>{{{ $equipment['name'] }}}</h2>

    {{---- EDIT -----}}
    {{ Form::open(array('url' => '/equipment/edit')) }}

        {{ Form::hidden('id',$equipment['id']); }}

        <div class='form-group'>
            {{ Form::label('name','Name') }}
            {{ Form::text('name',$equipment['name']); }}
        </div>

        <div class='form-group'>
            {{ Form::label('band','Band') }}
            {{ Form::text('band',$equipment['band']); }}
        </div>

        <div class='form-group'>
            {{ Form::label('model','Model') }}
            {{ Form::text('model',$equipment['model']); }}
        </div>
        <div class='form-group'>
            {{ Form::label('serial_number','Serial_number') }}
            {{ Form::text('serial_number',$equipment['serial_number']); }}
        </div>

        <div class='form-group'>
            {{ Form::label('image_link','image_link URL') }}
            {{ Form::text('image_link',$equipment['image_link']); }}
        </div>


        <div class='form-group'>
            @foreach($categories as $id => $category)
                {{ Form::checkbox('$categories[]', $id, $equipment->$category->contains($id)); }} {{ $category}}
                &nbsp;&nbsp;&nbsp;
            @endforeach
        </div>

        {{ Form::submit('Save'); }}

    {{ Form::close() }}

    <div>
        {{---- DELETE -----}}
        {{ Form::open(array('url' => '/$equipment/delete')) }}
            {{ Form::hidden('id',$equipment['id']); }}
            <button onClick='parentNode.submit();return false;'>Delete</button>
        {{ Form::close() }}
    </div>


@stop