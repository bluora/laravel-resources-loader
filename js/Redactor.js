window.extensions_initializer['auto-init-redactor'] = function() {
    if (!$(this).hasClass('redactor-applied')) {
        options = {};
        if ($(this).data('toolbar-buttons')) {
            options['buttons'] = $(this).data('toolbar-buttons');
        }
        if ($(this).data('toolbar-plugins')) {
            options['plugins'] = $(this).data('toolbar-plugins');
        }
        $(this).redactor(options);
        $(this).addClass('redactor-applied');
    }
}