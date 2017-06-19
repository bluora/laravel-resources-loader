
window.extensions_initializer['init-date-input'] = function() {
    options = {};
    options['zIndexOffset'] = 1001;
    options['format'] = 'dd/mm/yyyy';
    options['todayHighlight'] = true;
    options['todayBtn'] = true;
    $(this).datepicker(options);
}