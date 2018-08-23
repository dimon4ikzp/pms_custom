(function($) {
    $.fn.updateBrowserUrl = function(data) {
        $.extend(data, {title: 'Messages'});
        //console.log(data, 'data');
        window.history.pushState(data, data.title, data.url);
    };
})(jQuery);