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
                        <td>{{ $mac->brand }}</td>
                        <td>{{ $mac->model }}</td>
                        <td>{{ $mac->serial_number }}</td>

                        <td>
                        <a href="{{ action('MacController@index') }}" class="btn btn-default">Cancel</a>
                        <a href="{{ action('MacController@edit', $mac->id) }}"  class="btn btn-default">Edit</a>
                        <a href="{{ action('MacController@delete', $mac->id) }}" class="btn btn-danger">Delete</a>
                         </td>
                </tr>

            </tbody>
        </table>

@stop

