@extends('layout.main')

@section('content')
    <div class="page-header">
        <h1>All Laptops </h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('LaptopController@create') }}" class="btn btn-primary">Add new Laptop</a>
        </div>
    </div>

    @if ($laptops->isEmpty())
        <p>There are no Laptops! :(</p>
    @else
        <table class="table table-striped">
                <thead>
                    <tr>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Serial Number</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($laptops as $laptop)
                <tr>
                    <td>{{ $laptop->name }}</td>
                    <td>{{ $laptop->model }}</td>
                    <td>{{ $laptop->path }}</td>
                    <td>{{ $laptop->serial_nmber ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ action('LaptopController@show', $laptop->id) }}" class="btn btn-default">Show</a>
                        <a href="{{ action('LaptopController@edit', $laptop->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('LaptopController@delete', $laptop->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop
