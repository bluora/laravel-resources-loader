
var googlemap_geocoder;
var googlemap_maps = {};
var googlemap_markers = {};

window.extensions_initializer['init-google-maps'] = function() {
    if (typeof googlemap_geocoder == 'undefined') {
        googlemap_geocoder = new google.maps.Geocoder();
    }

    map_zoom =  $(this).data('map-zoom');
    if (map_zoom == undefined) {
        map_zoom = 14;
    }

    googlemap_maps[$(this).prop('id')] = new google.maps.Map(document.getElementById($(this).prop('id')), {
        center: new google.maps.LatLng($(this).data('lat'), $(this).data('lng')),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoom: map_zoom
    });
    latlng = {lat: $(this).data('lat'), lng: $(this).data('lng')};

    icon_width =  $(this).data('icon-width');
    if (icon_width == undefined) {
        icon_width = 22;
    }
    icon_height =  $(this).data('icon-height');
    if (icon_height == undefined) {
        icon_height = 30;
    }

    draggable =  ($(this).data('draggable') != undefined);

    googlemap_markers[$(this).prop('id')] = new google.maps.Marker({
        map: googlemap_maps[$(this).prop('id')],
        position: latlng,
        draggable: draggable,
        icon: {url: $(this).data('icon-url'), scaledSize: new google.maps.Size(icon_width, icon_height)},
    });

    $(this).trigger('extension::googlemap::applied');
}
