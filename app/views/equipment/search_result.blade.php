<section>
	<!-- <img class='cover' src='{{ $Equipment['cover'] }}'> -->

	<h2>{{ $Equipment['name'] }}</h2>

	<p>
	{{ $Equipment['category']->name }} {{ $Equipment['serial_number'] }}
	</p>

	<p>
		@foreach($Equipment['categories'] as $category)
			{{ $category->name }}
		@endforeach
	</p>

	<!-- <a href='{{ $Equipment['cover'] }}'>Purchase this Equipment...</a> -->
	<br>
	<a href='/Equipment/edit/{{ $Equipment->id }}'>Edit</a>
</section>