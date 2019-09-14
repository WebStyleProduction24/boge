$(document).ready(function(){
$("#globalNav").clone().addClass('globalNav_clone').removeAttr('id').prependTo("#navBar");  
$('body').append("<span class='mobile_menu'></span><span class='mobile_shirma'></span>");
	$(".mobile_menu, .mobile_shirma").click(function(){
	$('#navBar').toggleClass('open');
	$('.mobile_menu').toggleClass('open');
	$('body').toggleClass('noscroll');
	$('.mobile_shirma').toggleClass('open');
});
$(window).resize(function(){
	$('#navBar').removeClass('open');
	$('.mobile_menu').removeClass('open');
	$('body').removeClass('noscroll');
	$('.mobile_shirma').removeClass('open');
	win_w = $(window).width();
	if(win_w <= 570){
		$("head").prepend('<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes"><meta name="HandheldFriendly" content="true"><meta name="apple-mobile-web-app-capable" content="YES">');
	}
	else{
		$("meta[name='HandheldFriendly'], meta[name='viewport'], meta[name='apple-mobile-web-app-capable']").remove();
	};
	
});
$(".removeResp").click(function(){  
	$('link.responsive').remove();
	$('body').css({width : '1250px'});
	});
win_w = $(window).width();
console.log(win_w)
if(win_w <= 570){
	$("head").prepend('<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes"><meta name="HandheldFriendly" content="true"><meta name="apple-mobile-web-app-capable" content="YES">');
	
}
	else{
		$("meta[name='HandheldFriendly'], meta[name='viewport'], meta[name='apple-mobile-web-app-capable']").remove();
	};
})

