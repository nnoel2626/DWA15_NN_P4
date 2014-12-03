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
              {{---- @foreach($tripod as $tripod)--}}
                         <tr>
                        <td>{{ $tripod->brand }}</td>
                        <td>{{ $tripod->model }}</td>
                        <td>{{ $tripod->serial_number }}</td>

                        <td>
                        <a href="{{ action('TripodController@index') }}" class="btn btn-default">Cancel</a>
                        <a href="{{ action('TripodController@edit', $tripod->id) }}"  class="btn btn-default">Edit</a>
                        <a href="{{ action('TripodController@delete', $tripod->id) }}" class="btn btn-danger">Delete</a>
                         </td>
                </tr>
                {{--@endforeach--}}
            </tbody>
        </table>

@stop





    <td>{{ $tripod->brand }}</td>

    <td>{{ $tripod->model }}</td>

    <td>{{ $tripod->serial_number }}</td>

    <td>{{ $tripod->created_at }}</td>

    <td>{{ $tripod->updated_at }}</td>


@stop






