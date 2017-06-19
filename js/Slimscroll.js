window.extensions_initializer['init-slimscroll'] = function() {
    options = {
        touchScrollStep: 50,
        alwaysVisible: true
    };
    if ($(this).data('slimscroll-height')) {
        options.height = $(this).data('slimscroll-height');
    }
    $(this).slimScroll(options);
}