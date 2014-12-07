@extends('layout.main')

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

                         <tr>
                        <td>{{ $dungle->brand }}</td>
                        <td>{{ $dungle->model }}</td>
                        <td>{{ $dungle->serial_number }}</td>

                        <td>
                        <a href="{{ action('DungleController@index') }}" class="btn btn-default">Cancel</a>
                        <a href="{{ action('DungleController@edit', $dungle->id) }}"  class="btn btn-default">Edit</a>
                        <a href="{{ action('DungleController@delete', $dungle->id) }}" class="btn btn-danger">Delete</a>
                         </td>
                </tr>

            </tbody>
        </table>

@stop

