  @extends('layout._master')
@section('title')
Equipments
@stop
@section('content')
<h1>Equipment</h1>
<div>
View as:
<a href='/equipment/?format=json' target='_blank'>JSON</a> |
<a href='/equipment/?format=pdf' target='_blank'>PDF</a>
</div>
{{--@if($query)
<h2>You searched for {{{ $query }}}</h2>
@endif --}}
@if(sizeof($equipment) == 0)
No results
@else
@foreach($equipment as $equipment)
<section class='equipment'>
</p>

@foreach($equipment['categories'] as $category)
<span class='category'>{{{ $category->name }}}</span>
@endforeach
<img src="/{{$equipment['image_path']}}">
<h2>{{ $equipment['brand'] }}</h2>
<p> {{ $equipment['model'] }} </p>
<p> {{$equipment['serial_number'] }} </p>
<p> {{$equipment['image_path'] }} </p>

<a href="{{ action('EquipmentController@getEdit', $equipment->id) }}" class="btn btn-default">Edit</a>
<a href="{{ action('EquipmentController@getDelete', $equipment->id) }}" class="btn btn-danger">Delete</a>
<a href="{{ action('EquipmentController@getCreate') }}" class="btn btn-primary">Add </a>


<br> <br>
</section>
@endforeach
@endif
@stop