
window.extensions_initializer['init-time-input'] = function() {
    var current_element = $(this);
    element_id = current_element.attr('id');
    if (this.nodeName.toLowerCase() == 'input') {
        if (current_element.hasClass('ui-timepicker-input')) {
            $(current_element).timepicker('remove');
        } else {
            current_element.data('original', $("<div />").append(current_element.clone()).html());
        }
        $(current_element).timepicker({});
    }
}
