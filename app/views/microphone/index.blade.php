@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>All Microphones </h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('MicrophoneController@create') }}" class="btn btn-primary">Add new Microphone</a>
        </div>
    </div>

    @if ($tripods->isEmpty())
        <p>There are no Microphones! :(</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Serial_number</th>
                    <th>Path</th>
                </tr>
            </thead>
            <tbody>
                @foreach($microphones as $microphone)
                <tr>
                    <td>{{ $microphone->name }}</td>
                    <td>{{ $microphone->model }}</td>
                    <td>{{ $microphone->path }}</td>
                    <td>{{ $microphone->serial_nmber ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ action('MicrophoneController@show', $microphone->id) }}" class="btn btn-default">Show</a>
                        <a href="{{ action('MicrophoneController@edit', $microphone->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('MicrophoneController@delete', $microphone->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop
