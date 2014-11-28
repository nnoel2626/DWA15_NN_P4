@extends('layout.main')

@section('content')
        <div class="page-header">
        <h1>All Tripods <small>Gotta catch 'em all!</small></h1>
        </div>
            <div class="panel panel-default">
                <div class="panel-body">
                 <a href="{{ action('TripodController@create') }}" class="btn btn-primary">Add new Tripod</a>
              </div>
            </div>
    @if ($tripods->isEmpty())
        <p>There are no Tripods! :(</p>

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
                @foreach($tripods as $tripod)
                         <tr>
                        <td>{{ $tripod->Brand }}</td>
                        <td>{{ $tripod->model }}</td>
                        <td>{{ $tripod->serial_number }}</td>

                        <td>
                            <a href="{{ action('TripodController@show', $tripod->id) }}" class="btn btn-default">Show</a>
                        <a href="{{ action('TripodController@edit', $tripod->id) }}"  class="btn btn-default">Edit</a>
                        <a href="{{ action('TripodController@delete', $tripod->id) }}" class="btn btn-danger">Delete</a>
                         </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop
