
window.extensions_initializer['init-icheck-input'] = function() {
    if (!$(this).hasClass('icheck-applied')) {
        if (!($(this).parent().hasClass('config-icheck-input_flat-green')
            || $(this).parent().hasClass('iradio_flat-green'))) {
            $(this).addClass('icheck');
            $(this).addClass('icheckbox_flat-green');
            $(this).iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
            $(this).addClass('icheck-applied');
        }
    }
}