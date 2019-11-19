$('form').change(getdetails());
$( "#slider-range-power" ).on( "slidechange", function( event, ui ) { getdetails() } );
$( "#slider-range-performance" ).on( "slidechange", function( event, ui ) { getdetails() } );


function getdetails(){

	// alert('test');


	var category = $('#category').val(),
			type_compressor = $('input[name="type_compressor[]"]:checked').val(),
			
			engine_capacity_st = $('input[name="engine_capacity_st"]').val(),
			engine_capacity_en = $('input[name="engine_capacity_en"]').val(),
			performance_st = $('input[name="performance_st"]').val(),
			performance_en = $('input[name="performance_en"]').val(),
			heat_recovery = $('input[name="heat_recovery"]:checked').val(),
			
			type_oil_checked = $('input[name="type_oil[]"]:checked'),
			pressure_checked = $('input[name="pressure[]"]:checked'),
			sound_isolation_checked = $('input[name="sound_isolation[]"]:checked'),
			regulation_checked = $('input[name="regulation[]"]:checked'),
			cooling_checked = $('input[name="cooling[]"]:checked'),
			other_parameters_checked = $('input[name="other_parameters[]"]:checked'),
			
			type_oil = [],
			pressure = [],
			sound_isolation = [],
			regulation = [],
			cooling = [],
			other_parameters = [];

	for (var x=0; x<type_oil_checked.length;x++){ 
		type_oil.push(type_oil_checked[x].value); 
	}

	for (var x=0; x<pressure_checked.length;x++){ 
		pressure.push(pressure_checked[x].value); 
	}

	for (var x=0; x<sound_isolation_checked.length;x++){ 
		sound_isolation.push(sound_isolation_checked[x].value); 
	}

	for (var x=0; x<regulation_checked.length;x++){ 
		regulation.push(regulation_checked[x].value); 
	}

	for (var x=0; x<cooling_checked.length;x++){ 
		cooling.push(cooling_checked[x].value); 
	}

	for (var x=0; x<other_parameters_checked.length;x++){ 
		other_parameters.push(other_parameters_checked[x].value); 
	}

	if (type_oil_checked.length == 0 || (type_oil_checked.length == 1 && type_oil_checked.val() == 'all') || type_oil.indexOf( 'all' ) != -1) type_oil = 'all';
	if (pressure_checked.length == 0 ) pressure = 'all';
	if (sound_isolation.length == 0 ) sound_isolation = 'all';
	if (regulation.length == 0 ) regulation = 'all';
	if (cooling.length == 0 ) cooling = 'all';
	if (other_parameters.length == 0 ) other_parameters = 'all';

	if (heat_recovery !== 'Да' ) heat_recovery = 'Нет';

	$.ajax({
		type: "POST",
		url: "show.php",
		data: {
			cat: category,
			type_compressor: type_compressor,
			type_oil: type_oil,
			engine_capacity_st: engine_capacity_st,
			engine_capacity_en: engine_capacity_en,
			performance_st: performance_st,
			performance_en: performance_en,
			pressure: pressure,
			heat_recovery: heat_recovery,
			sound_isolation: sound_isolation,
			regulation: regulation,
			cooling: cooling,
			other_parameters: other_parameters
		}
	}).done(function( data )
	{
		$("#msg").html( data );
	});
}