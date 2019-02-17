jQuery(function($){
$(document).ready(function(){
  height= screen.height/2;
  $(window).scroll(function(){
    if($(window).scrollTop()>height){
      $('#top-scroller').fadeIn(500)
    }else{
      $('#top-scroller').fadeOut(500)
    }
  });
});
});