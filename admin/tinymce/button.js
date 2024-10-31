(function() {
    tinymce.PluginManager.add('rstab_tc_button', function( editor, url ) {
        editor.addButton( 'rstab_tc_button', {
            text: 'Tab Shortcode',
            icon: false,
            onclick: function() {
                editor.insertContent('[rstab category="Category_Name"]');
            }
        });
    });
})();