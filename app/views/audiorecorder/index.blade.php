@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>All Audiorecorders </h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('AudiorecorderController@create') }}" class="btn btn-primary">Add new Audiorecorder</a>
        </div>
    </div>

    @if ($audiorecorder->isEmpty())
        <p>There are no audiorecorders! :(</p>
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
                @foreach($audiorecorder as $audiorecorder)
                 <tr>
                        <td>{{ $audiorecorder->brand }}</td>
                        <td>{{ $audiorecorder->model }}</td>
                        <td>{{ $audiorecorder->serial_number }}</td>

                        <td>
                         <a href="{{ action('AudiorecorderController@show', $audiorecorder->id) }}" class="btn btn-default">Show</a>
                        <a href="{{ action('AudiorecorderController@edit', $audiorecorder->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('AudiorecorderController@delete', $audiorecorder->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop
