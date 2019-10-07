
$(function() {
   $('#radio_control').on('click', 'input:radio', function() { //обрабатываем события радио кнопок
      $('#control > div').hide() //скрыть все div
      val = "#" + $(this).val()
      // alert( val )
      $(val).show()
   })
});