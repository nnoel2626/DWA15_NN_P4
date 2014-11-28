@extends('layout.main')

@section('content')

        <div class="page-header">
        <h1>All Projectors <small>Gotta catch 'em all!</small></h1>
        </div>
            <div class="panel panel-default">
                <div class="panel-body">
                 <a href="{{ action ('ProjectorController@create') }}" class="btn btn-primary">Add new Projector</a>
              </div>
            </div>
    @if ($projectors->isEmpty())
        <p>There are no Projectors! :(</p>

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
                @foreach($projectors as $projector)
                         <tr>
                        <td>{{ $projector->Brand }}</td>
                        <td>{{ $projector->model }}</td>
                        <td>{{ $projector->serial_number }}</td>

                        <td>
                        <a href="{{ action('ProjectorController@show', $projector->id) }}" class="btn btn-default">Show</a>
                        <a href="{{ action('ProjectorController@edit', $projector->id) }}"  class="btn btn-default">Edit</a>
                        <a href="{{ action('ProjectorController@delete', $projector->id) }}" class="btn btn-danger">Delete</a>
                         </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop
