<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="search/modules/range.css">

<script>
	$( function() {
		$( "#slider-range-power" ).slider({
			range: true,
			min: 0.65,
			max: 355,
			step: 0.01,
			values: [ 110, 250 ],
			slide: function( event, ui ) {
        // $( "#amount" ).val( ui.values[ 0.00 ] + " - " + ui.values[ 1.00 ] );
        $( "#amount-power" ).val( ui.values[ 0 ].toFixed(2) + ' кВт - ' + ui.values[ 1 ].toFixed(2) + ' кВт' );
      }
    });
		$( "#amount-power" ).val( $( "#slider-range-power" ).slider( "values", 0 ).toFixed(2) +
			' кВт - ' + $( "#slider-range-power" ).slider( "values", 1 ).toFixed(2) + ' кВт' );

		$( "#slider-range-performance" ).slider({
			range: true,
			min: 0.08,
			max: 50.30,
			step: 0.01,
			values: [ 15, 35 ],
			slide: function( event, ui ) {
        // $( "#amount" ).val( ui.values[ 0.00 ] + " - " + ui.values[ 1.00 ] );
        $( "#amount-performance" ).val( ui.values[ 0 ].toFixed(2) + " м\u00B3/мин - " + ui.values[ 1 ].toFixed(2) + " м\u00B3/мин" );
      }
    });
		$( "#amount-performance" ).val( $( "#slider-range-performance" ).slider( "values", 0 ).toFixed(2) +
					" м\u00B3/мин - " + $( "#slider-range-performance" ).slider( "values", 1 ).toFixed(2) + " м\u00B3/мин" );
	} );
</script>

<div id="control" class="col-12">
	<div id="option1" style="display: block">
		<p>
			<label for="amount">Выберите мощность по шкале:</label>
			<input class="text-success" type="text" id="amount-power" readonly />
		</p>

		<div id="slider-range-power" class="mb-3"></div>
	</div>


	<div id="option2">
		<p>
			<label for="amount-performance">Выберите производительность по шкале:</label>
			<input class="text-success" type="text" id="amount-performance" readonly />
		</p>

		<div id="slider-range-performance" class="mb-3"></div>
	</div>



</div>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="search/modules/radio-control.js"></script>