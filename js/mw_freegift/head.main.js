window.FreeGift = {
    Models: {},
    Collections: {},
    Views: {},
    $: null
};
head.js(
    mw_baseUrl + "js/mw_freegift/lib/underscore.js",
    mw_baseUrl + "js/varien/product.js",
    mw_baseUrl + "js/varien/configurable.js",
    mw_baseUrl + "js/mw_freegift/lib/jquery.plugins.min.js",
    mw_baseUrl + "js/mw_freegift/lib/jquery-migrate-1.2.1.min.js",
    mw_baseUrl + "js/mw_freegift/lib/backbone-min.js",
    function(){
        _.extend(window.FreeGift, Backbone.Events);

        head.js(mw_baseUrl + "js/mw_freegift/view.js");

    });