 @extends('layout.main')

 @section('title')
   Equipments
@stop

 @section('content')

     <h1>Equipments</h1>

 <div>
         View as:
         <a href='/equipment/?format=json' target='_blank'>JSON</a> |
         <a href='/equipment/?format=pdf' target='_blank'>PDF</a>
     </div>


     @if($query)
         <h2>You searched for {{{ $query }}}</h2>
     @endif

     @if(sizeof($equipments) == 0)
         No results
     @else

         @foreach($equipments as $equipment)
             <section class='equipment'>

                     </p>
                      @foreach($equipments['categories'] as $category)
                         <span class='category'>{{{ $category->name }}}</span>
                     @endforeach
                        <p>

                        <h2>{{ $equipment['brand'] }}</h2>
                        <p>    {{ $equipment['model'] }} </p>
                          <p>  {{$equipment['serial_number'] }} </p>

                <br>

            </section>
         @endforeach

     @endif

 @stop

