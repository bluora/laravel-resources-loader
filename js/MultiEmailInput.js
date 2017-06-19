window.extensions_initializer['init-multi-email-input'] = function() {
    if (!$(this).hasClass('multi-email-input-applied')) {
        $(this).multiEmail();
        $(this).addClass('multi-email-input-applied');
        $(this).addClass('bootstrap-multiemail');
    }
}
