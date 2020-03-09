/**
* Advanced Property Framework Single Map
*
* @package Advanced Property Framework
* @since 1.0
*/

function apf_single_map() {

    var $ = jQuery;

    // Define the latitude and longitude positions
    var latitude = parseFloat($('#map_single').data('lat'));
    var longitude = parseFloat($('#map_single').data('lng'));
    var latlngPos = new google.maps.LatLng(latitude, longitude);

    var mapOptions = {
        zoom: 18,
        center: latlngPos,
        mapTypeId: google.maps.MapTypeId.ROADMAP,

        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL,
            position: google.maps.ControlPosition.LEFT_BOTTOM
        },
        panControl: false,
        panControlOptions: {
            position: google.maps.ControlPosition.BOTTOM_RIGHT
        },

        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.BOTTOM_CENTER
        },

        streetViewControl: true,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.LEFT_BOTTOM
        },
        scrollwheel: false,
        draggable: true
    };

    // Define the map
    map = new google.maps.Map(document.getElementById("map_single"), mapOptions);

    var marker_icon = new google.maps.MarkerImage(the_hard_men_path+"/modules/advanced-property-framework/img/marker-property.png", null, null, null, new google.maps.Size(50,38));

    // Add the marker
    var marker = new google.maps.Marker({
        position: latlngPos,
        map: map,
        icon: marker_icon
    });

    // Center map on resize (responsive)
    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });

    // transit layer
    var transitLayer = new google.maps.TransitLayer();
    transitLayer.setMap(map);

    /* Streetview */
    // var panorama = new google.maps.StreetViewPanorama(
    //     document.getElementById('street_single'), {
    //         position: latlngPos,
    //         pov: {
    //             heading: 34,
    //             pitch: 10
    //         }
    //     }
    // );
}

jQuery(document).ready(function($) {
    if($('#map_single').length > 0) { 
        // lazyload
        var bLazy = new Blazy({
            selector: '#map_single',
            success: function(element){
                apf_single_map();
            }
        });
    }
});
