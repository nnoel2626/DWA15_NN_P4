@extends('layout.main')

@section('content')
<table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Serial Number</th>
                    <th>image_path</th>
                    </tr>
                </thead>
        <tbody>
                    <tr><td>{{ $equipment->name }}</td>
                        <td>{{ $equipment->brand }}</td>
                        <td>{{ $equipment->model }}</td>
                        <td>{{ $equipment->serial_number }}</td>
                        <td>{{ $equipment->imgage_path }}</td>

                        <td>
                        <a href="{{ action('EquipmentController@getIndex') }}" class="btn btn-default">Cancel</a>
                        <a href="{{ action('EquipmentController@getEdit', $equipment->id) }}"  class="btn btn-default">Edit</a>
                        <a href="{{ action('EquipmentController@getDelete', $equipment->id) }}" class="btn btn-danger">Delete</a>
                         </td>
                </tr>

            </tbody>
        </table>

@stop