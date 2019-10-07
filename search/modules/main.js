function init() {
    if (page === 'catalog') {
        catalog.init();
        cart.init(optionsCatalog);
    }
    // --- Новый код
    if (page === 'catalogDB') {
        catalogDB.init();
        cart.init(optionsCatalog);
    }
    // --- Новый код
    if (page === 'cart') {
        cart.init(optionsCart);
    }
    if (page === 'order') {
        order.init();
        cart.init(optionsOrder);
    }
}