
window.extensions_initializer['init-dropzone'] = function() {
    if ($(this).find('.dz-message').length == 0) {
        options = $(this).data('dropzone-options');
        if (options === '') {
            options = {};
        }
        if (typeof $(this).data('dropzone-init') == 'function') {
            options['init'] = $(this).data('dropzone-init');
        }
        $(this).dropzone(options);
    }
}  