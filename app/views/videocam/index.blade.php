
 list videocam




@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>All Tripods <small>Gotta catch 'em all!</small></h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('TripodsController@create') }}" class="btn btn-primary">Add new Tripod</a>
        </div>
    </div>

    @if ($tripods->isEmpty())
        <p>There are no Tripods! :(</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Publisher</th>
                    <th>Complete</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tipods as $tripod)
                <tr>
                    <td>{{ $tripod->name }}</td>
                    <td>{{ $tripod->model }}</td>
                    <td>{{ $tripod->path }}</td>
                    <td>{{ $tripod->serial_nmber ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ action('TripodsController@edit', $$tripod->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('TripodsController@delete', $$tripod->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop
