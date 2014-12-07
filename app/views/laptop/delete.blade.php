
@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>Delete an laptop from the library</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('LaptopController@create') }}" class="btn btn-primary">Create Laptop</a>
        </div>
    </div>

<form action="{{ action('LaptopController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="laptop" value="{{ $laptop->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('LaptopController@index') }}" class="btn btn-default">No way!</a>
    </form>
@stop
