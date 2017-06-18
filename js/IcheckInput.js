
window.extensions_initializer['auto-init-icheck-input'] = function() {
    if (!($(this).parent().hasClass('icheckbox_flat-green')
        || $(this).parent().hasClass('iradio_flat-green'))) {
        $(this).iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    }
}