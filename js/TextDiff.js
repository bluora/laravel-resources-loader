window.extensions_initializer['auto-init-text-diff'] = function() {
    options = {
        originalContent: $(this).find('.pretty-text-original').html(),
        changedContent: $(this).find('.pretty-text-changed').html(),
        diffContainer: $(this).find('.pretty-text-container')
    };
    $(this).prettyTextDiff(options);
    if ($(this).find('.pretty-text-original').html() == '') {
        $(this).find('.pretty-text-original').html('<del>{empty value}</del>');
    } else if ($(this).find('.pretty-text-changed').html() == '') {
        $(this).find('.pretty-text-original').show();
        $(this).find('.pretty-text-original').html('<del>' + $(this).find('.pretty-text-original').html() + '</del><ins>{empty value}</ins>');
        $(this).find('.pretty-text-changed').html('{empty value}');
        $(this).find('.pretty-text-container').hide();
    } else {
        $(this).find('.pretty-text-original').hide();
        $(this).find('.pretty-text-container').show();
    }
}