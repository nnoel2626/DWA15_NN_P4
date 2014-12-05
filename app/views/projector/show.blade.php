@extends('layout.main')

            @section('title')
            Show Projector
            @stop

            @section('head')

            @stop


@section('content')

        <table class="table table-striped">
                <thead>
                    <tr>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Serial Number</th>
                    </tr>
                </thead>
        <tbody>
              {{---- @foreach($tripod as projector)--}}
                         <tr>
                        <td>{{ $projector->brand }}</td>
                        <td>{{ $projector->model }}</td>
                        <td>{{ $projector->serial_number }}</td>

                        <td>
                        <a href="{{ action('ProjectorController@index') }}" class="btn btn-default">Cancel</a>
                        <a href="{{ action('ProjectorController@edit', $projector->id) }}"  class="btn btn-default">Edit</a>
                        <a href="{{ action('ProjectorController@delete', $projector->id) }}" class="btn btn-danger">Delete</a>
                         </td>
                </tr>
                {{--@endforeach--}}
            </tbody>
        </table>
@stop
