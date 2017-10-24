window.extensions_initializer['init-select-chooser'] = function() {
    $(this).on('change', function() {
        var url = $(this).data('url').replace('OPTION_VALUE', $(this).val());
        window.location.href = url;
    });
}
