

@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>All Videocams </h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('VideocamController@create') }}" class="btn btn-primary">Add new Videocam</a>
        </div>
    </div>

    @if ($videocams->isEmpty())
        <p>There are no Videocams! :(</p>
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
                @foreach($videocams as $videocam)
                <tr>
                    <td>{{ $videocam->name }}</td>
                    <td>{{ $videocam->model }}</td>
                    <td>{{ $videocam->path }}</td>
                    <td>{{ $videocam->serial_nmber }}</td>
                    <td>
                        <a href="{{ action('VideocamController@show', $videocam->id) }}" class="btn btn-default">Show</a>
                        <a href="{{ action('VideocamController@edit', $videocam->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('VideocamController@delete', $videocam->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop
