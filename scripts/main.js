/**
 * @author Batch Themes Ltd.
 */
(function() {
    'use strict';

    $(function() {

        var config = {
            name: 'Marino',
            theme: 'palette-5',
            palette: getPalette('palette-5'),
            layout: 'default-sidebar',
            direction: 'ltr', //ltr or rtl
            colors: getColors()
        };

        //$.removeAllStorages();
        if ($.localStorage.isEmpty('config') || !($.localStorage.get('config'))) {
            $.removeAllStorages();
            $.localStorage.set('config', config);
        }
        //var config = $.localStorage.get('config');

    });
})();
