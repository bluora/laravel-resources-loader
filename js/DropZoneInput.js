
window.extensions_initializer['auto-init-dropzone-input'] = function() {
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