window.extensions_initializer['auto-init-multi-email'] = function() {
    if (!$(this).hasClass('multiemail-applied')) {
        $(this).multiEmail();
        $(this).addClass('multiemail-applied');
    }
}
