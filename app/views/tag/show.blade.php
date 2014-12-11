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
                    <th>Caption</th>
                    <th>Image_path</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Serial Number</th>
                    </tr>
                </thead>
        `<tbody>
                <tr>
                        <td>{{ $projector->caption }}</td>
                        <td>{{ $projector->path }}</td>
                        <td>{{ $projector->brand }}</td>
                        <td>{{ $projector->model }}</td>
                        <td>{{ $projector->serial_number }}</td>

                        <td>
                        <a href="{{ action('ProjectorController@index') }}" class="btn btn-default">Cancel</a>
                        <a href="{{ action('ProjectorController@edit', $projector->id) }}"  class="btn btn-default">Edit</a>
                        <a href="{{ action('ProjectorController@delete', $projector->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                 </tr>
            </tbody>
        </table>
@stop
