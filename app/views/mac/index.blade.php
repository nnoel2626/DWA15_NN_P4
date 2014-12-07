@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>All Macs </h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('MacController@create') }}" class="btn btn-primary">Add new Mac</a>
        </div>
    </div>

    @if ($macs->isEmpty())
        <p>There are no Macs! :(</p>
    @else
        <table class="table table-striped">
                <thead>
                    <tr>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Serial Number</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($macs as $mac)
                <tr>
                    <td>{{ $mac->name }}</td>
                    <td>{{ $mac->model }}</td>
                    <td>{{ $mac->path }}</td>
                    <td>{{ $mac->serial_nmber}}</td>
                    <td>
                        <a href="{{ action('MacController@show', $mac->id) }}" class="btn btn-default">Show</a>
                        <a href="{{ action('MacController@edit', $mac->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('MacController@delete', $mac->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop
