$( function() {
	$( "#slider-range-power" ).slider({
		range: true,
		min: 0.65,
		max: 355,
		step: 0.01,
		values: [ 0.65, 355 ],
		slide: function( event, ui ) {
			$( "#amount-power-st" ).val( ui.values[ 0 ].toFixed(2) );
			$( "#amount-power-en" ).val( ui.values[ 1 ].toFixed(2) );

			// var engine_capacity_st = $( "#amount-power-st" ).val(),
					// engine_capacity_en = $( "#amount-power-en" ).val();
		}
	});
	$( "#amount-power-st" ).val( $( "#slider-range-power" ).slider( "values", 0 ).toFixed(2) );
	$( "#amount-power-en" ).val( $( "#slider-range-power" ).slider( "values", 1 ).toFixed(2) );

	$( "#slider-range-performance" ).slider({
		range: true,
		min: 0.08,
		max: 50.30,
		step: 0.01,
		values: [ 0.08, 50.30 ],
		slide: function( event, ui ) {
			$( "#amount-performance-st" ).val( ui.values[ 0 ].toFixed(2) );
			$( "#amount-performance-en" ).val( ui.values[ 1 ].toFixed(2) );
		}
	});
	$( "#amount-performance-st" ).val( $( "#slider-range-performance" ).slider( "values", 0 ).toFixed(2) );
	$( "#amount-performance-en" ).val( $( "#slider-range-performance" ).slider( "values", 1 ).toFixed(2) );
} );