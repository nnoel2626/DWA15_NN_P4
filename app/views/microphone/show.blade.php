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
                        <td>{{ $microphone->brand }}</td>
                        <td>{{ $microphone->model }}</td>
                        <td>{{ $microphone->serial_number }}</td>

                        <td>
                        <a href="{{ action('MicrophoneController@index') }}" class="btn btn-default">Cancel</a>
                        <a href="{{ action('MicrophoneController@edit', $microphone->id) }}"  class="btn btn-default">Edit</a>
                        <a href="{{ action('MicrophoneController@delete', $microphone->id) }}" class="btn btn-danger">Delete</a>
                         </td>
                </tr>
            </tbody>
        </table>

@stop

