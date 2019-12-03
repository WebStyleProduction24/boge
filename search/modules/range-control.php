	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="modules/range.css">

	<script>
		$( function() {
			$( "#slider-range-power" ).slider({
				range: true,
				min: 0.65,
				max: 355,
				step: 0.01,
				values: [ 0.65, 355 ],
				slide: function( event, ui ) {
        // $( "#amount" ).val( ui.values[ 0.00 ] + " - " + ui.values[ 1.00 ] );
        $( "#amount-power-st" ).val( ui.values[ 0 ].toFixed(2) );
        $( "#amount-power-en" ).val( ui.values[ 1 ].toFixed(2) );
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
        // $( "#amount" ).val( ui.values[ 0.00 ] + " - " + ui.values[ 1.00 ] );
        $( "#amount-performance-st" ).val( ui.values[ 0 ].toFixed(2) );
        $( "#amount-performance-en" ).val( ui.values[ 1 ].toFixed(2) );
      }
    });
			$( "#amount-performance-st" ).val( $( "#slider-range-performance" ).slider( "values", 0 ).toFixed(2) );
			$( "#amount-performance-en" ).val( $( "#slider-range-performance" ).slider( "values", 1 ).toFixed(2) );
		} );
	</script>

	<div id="control" class="col-12">
		<div id="option1" style="display: block">
			<p>
				<label for="amount">Выберите мощность по шкале:</label>
				<span class="text-success">
					<input class="text-success" name="engine_capacity_st" value="" type="text" id="amount-power-st" readonly /> кВт - <input class="text-success" name="engine_capacity_en" value="" type="text" id="amount-power-en" readonly /> кВт
				</span>
			</p>

			<div id="slider-range-power" class="mb-3"></div>
		</div>


		<div id="option2">
			<p>
				<label for="amount-performance">Выберите производительность по шкале:</label>
				<span class="text-success">
					<input class="text-success" name="performance_st" value="" type="text" id="amount-performance-st" readonly /> м<sup>3</sup>/мин - <input class="text-success" name="performance_en" value="" type="text" id="amount-performance-en" readonly /> м<sup>3</sup>/мин
				</span>
			</p>

			<div id="slider-range-performance" class="mb-3"></div>
		</div>



	</div>

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="modules/radio-control.js"></script>