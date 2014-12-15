

@extends('layout.main')

@section('title')

All the Categories
@stop

@section('content')
    <div class="page-header">
        <h2>All Categories </h2>
    </div>

        <div class="panel panel-default">
            <div class="panel-body">

           @if ($categories->isEmpty())
        <p>There are no Tripods! :(</p>
    @else

     <table class="table table-striped">
            <thead>
                <tr>
                    <th>All Categories</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                      <td>{{ $category->name }}</td>
                        <td>

            <a href="{{ action('CategoryController@getEdit', $category->id) }}" class="btn btn-default">Edit</a>
            <a href="{{ action('CategoryController@postDelete', $category->id) }}" class="btn btn-danger">Delete</a>
            <a href="{{ action('CategoryController@getCreate') }}" class="btn btn-primary">Add new Category</a>
            </div>
                </td>
                 </tr>
                    @endforeach
            </tbody>

        </table>
 @endif

@stop


{{---<div>
<a href='/category/{{ $category->id }}'>{{ $category->name }}</a>
</div>--}}
