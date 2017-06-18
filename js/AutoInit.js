
window.extensions_document_load = {};
window.extensions_initializer = {};
window.extensions_applied = [];

// Auto init any scripts
$(document).ready(function () {
    Object.keys(window.extensions_document_load).forEach(function(extension_name) {
        if ($('script[src*="' + extension_name + '"]').length > 0 || $('.' + extension_name).length) {
            window.extensions_document_load[extension_name]();
        }
    });

    Object.keys(window.extensions_initializer).forEach(function(extension_name) {
        if ($('script[src*=' + extension_name + ']').length > 0 || $('.' + extension_name).length) {
            window.extensions_applied.push(extension_name);
            $('.'+extension_name).each(window.extensions_initializer[extension_name]);            
        }
    });

    $('body').on('extensions::init', findAndApplyScriptExtensions);
    $('ul.nav-tabs a').on('shown.bs.tab', findAndApplyScriptExtensions);

});

function findAndApplyScriptExtensions(event, restrict_search) {
    window.extensions_applied.forEach(function(extension_name) {
        if (typeof restrict_search == 'object') {
            $(restrict_search).find('.' + extension_name).each(window.extensions_initializer[extension_name]);
        } else if (typeof restrict_search == 'string') {
            $(restrict_search + ' .' + extension_name).each(window.extensions_initializer[extension_name]);
        } else {
            $(' .' + extension_name).each(window.extensions_initializer[extension_name]);
        }
    });
}