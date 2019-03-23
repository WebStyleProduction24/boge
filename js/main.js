$(function () {

	var number = 0;

	$('.load-more').on('click', function () {
		const btn = $(this);
		const loader = btn.find('span');
		number = number + 1;

		$.ajax({
			url: '/tz-1-8-data-' + number + '.html',
			type: 'GET',
			beforeSend: function() {
				btn.attr('disabled', true);
				loader.addClass('d-inline-block');
				$('.fa-angle-double-down').addClass('d-none');
			},
			success: function(responce) {
				setTimeout(function () {
					loader.removeClass('d-inline-block');
					btn.attr('disabled', false);
					console.log(responce);
					$('.after-posts').before(responce);
					$('.fa-angle-double-down').removeClass('d-none');
					if (number == 3) {
						$('.after-posts').addClass('d-none');
					}		
				}, 1000);
			},
			error: function(){
				btn.attr('disabled', false);
			}

		});

	});
});