
@extends('layout._master')

@section('title')

All the Categories
@stop

@section('content')
    <div class="page-header">
        <h2>Listing of all Categories </h2>
    </div>

        <div class="panel panel-default">
            <div class="panel-body" >

           @if ($categories->isEmpty())
        <p>There are no Categories! :(</p>
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