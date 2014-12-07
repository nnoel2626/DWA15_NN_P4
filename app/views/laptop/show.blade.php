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
                        <td>{{ $laptop->brand }}</td>
                        <td>{{ $laptop->model }}</td>
                        <td>{{ $laptop->serial_number }}</td>

                        <td>
                        <a href="{{ action('LaptopController@index') }}" class="btn btn-default">Cancel</a>
                        <a href="{{ action('LaptopController@edit', $laptop->id) }}"  class="btn btn-default">Edit</a>
                        <a href="{{ action('LaptopController@delete', $laptop->id) }}" class="btn btn-danger">Delete</a>
                         </td>
                </tr>

            </tbody>
        </table>

@stop

