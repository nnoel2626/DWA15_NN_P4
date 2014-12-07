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
                        <td>{{ $videocam->brand }}</td>
                        <td>{{ $videocam->model }}</td>
                        <td>{{ $videocam->serial_number }}</td>

                        <td>
                        <a href="{{ action('VideocamController@index') }}" class="btn btn-default">Cancel</a>
                        <a href="{{ action('VideocamController@edit', $videocam->id) }}"  class="btn btn-default">Edit</a>
                        <a href="{{ action('VideocamController@delete', $videocam->id) }}" class="btn btn-danger">Delete</a>
                         </td>
                </tr>

            </tbody>
        </table>

@stop

