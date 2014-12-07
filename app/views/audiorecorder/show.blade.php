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
                        <td>{{ $audiorecorder->brand }}</td>
                        <td>{{ $audiorecorder->model }}</td>
                        <td>{{ $audiorecorder->serial_number }}</td>

                        <td>
                        <a href="{{ action('AudiorecorderController@index') }}" class="btn btn-default">Cancel</a>
                        <a href="{{ action('AudiorecorderController@edit', $audiorecorder->id) }}"  class="btn btn-default">Edit</a>
                        <a href="{{ action('AudiorecorderController@delete', $audiorecorder->id) }}" class="btn btn-danger">Delete</a>
                         </td>
                </tr>

            </tbody>
        </table>

@stop

