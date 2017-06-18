window.extensions_initializer['auto-init-select2'] = function() {
    options = {};
    if ($(this).data('select2-placeholder')) {
        options.placeholder = $(this).data('select2-placeholder');
    }
    if ($(this).data('select2-allow-clear')) {
        options.allowClear = $(this).data('select2-allow-clear');
    }
    if ($(this).data('select2-remote-url')) {
        options.ajax = $(this).data('select2-remote-data');
        options.escapeMarkup = function (markup) { return markup; };
        options.minimumInputLength = 1;
        if ($(this).data('select2-remote-min-length')) {
            options.minimumInputLength = $(this).data('select2-remote-min-length');
        }
    }

    if ($(this).next().hasClass('select2')) {
        $(this).next().remove();
    }

    $(this).select2(options);

    $(this).trigger('extension::select2::applied');
}
