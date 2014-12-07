@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>All Dungles</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('DungleController@create') }}" class="btn btn-primary">Add new Dungle</a>
        </div>
    </div>

    @if ($dungles->isEmpty())
        <p>There are no Dungles! :(</p>
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
                @foreach($dungles as $dungle)
                <tr>
                    <td>{{ $dungle->name }}</td>
                    <td>{{ $dungle->model }}</td>
                    <td>{{ $dungle->path }}</td>
                    <td>{{ $dungle->serial_nmber }}</td>
                    <td>
                          <a href="{{ action('DungleController@show', $dungle->id) }}" class="btn btn-default">Show</a>
                        <a href="{{ action('DungleController@edit', $dungle->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('DungleController@delete', $dungle>id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop
