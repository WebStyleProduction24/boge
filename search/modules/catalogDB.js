'use strict';
 
// Модуль каталога для работы с БД
var catalogDB = (function($) {
 
    // Инициализация модуля
    function init() {
        console.info('init catalogDB');
    }
 
    // Экспортируем наружу
    return {
        init: init
    }
     
})(jQuery);