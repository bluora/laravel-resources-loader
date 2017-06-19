
window.extensions_initializer['init-icheck-input'] = function() {
    if (!($(this).parent().hasClass('config-icheck-input_flat-green')
        || $(this).parent().hasClass('iradio_flat-green'))) {
        $(this).addClass('icheck');
        $(this).iCheck({
            checkboxClass: 'config-icheck-input_flat-green',
            radioClass: 'iradio_flat-green'
        });
    }
}