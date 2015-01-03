/ Demo 1) Getting JSON data as a result and letting JS decide where to put the data on the page
$('#search-json').click(function() {
	$.ajax({
		type: 'POST',
		url: '/equipment/search',
		success: function(response) {

			// Clear the results from the last query
			$('#results').html('');

			// Parse through the response
			$.each(response, function( index, value ) {
				var author = response[index]['category']['name'];
				
				$('#results').append(title + ' by ' + category + '<br><br>');
			});

		},
		data: {
			format: 'json',
		    query: $('input[name=query]').val(),
		    _token: $('input[name=_token]').val(),
		},
	});
});


// Demo 2) Getting HTML/A View as a result and just throwing it in to the response div
$('#search-html').click(function() {
	$.ajax({
		type: 'POST',
		url: '/equipment/search',
		success: function(response) {
			$('#results').html(response);
		},
		data: {
			format: 'html',
		    query: $('input[name=query]').val(),
		    _token: $('input[name=_token]').val(),
		},
	});
});