(function($){
    let mapStyles  = [
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#42a5b9"
            },
            {
                "visibility": "on"
            }
        ]
    }
];

$.ajaxSetup({
    cache: true
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Google Map - Homepage
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function createHomepageGoogleMap(_latitude,_longitude){
    /* setMapHeight(); */
    if( document.getElementById('map') != null ){
        let base_url = $('meta[name="base-url"]').attr('content');
        let url      = base_url + '/get/property/listing/map';
        let params   = $("#property_search_form").serialize();
        function fn_error(result)
        {
            toast('error', result.message,'top-right');
            $("#property_search_form")[0].reset();
        }
        function fn_success(result){
            let map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                scrollwheel: false,
                center: new google.maps.LatLng(_latitude, _longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: mapStyles
            });
            let i;
            let newMarkers = [];
            for (i = 0; i < result.locations.data.length; i++) {
                let locations = result.locations.data;
                let pictureLabel = document.createElement("img");
                pictureLabel.src = base_url + '/img/home.png';
                let boxText = document.createElement("div");
                infoboxOptions = {
                    content: boxText,
                    disableAutoPan: false,
                    //maxWidth: 150,
                    pixelOffset: new google.maps.Size(-100, 0),
                    zIndex: null,
                    alignBottom: true,
                    boxClass: "infobox-wrapper",
                    enableEventPropagation: true,
                    closeBoxMargin: "0px 0px -8px 0px",
                    closeBoxURL: base_url + '/img/close.png',
                    infoBoxClearance: new google.maps.Size(1, 1)
                };
                let marker = new MarkerWithLabel({
                    title: locations[i]['title'],
                    position: new google.maps.LatLng(locations[i]['latitude'], locations[i]['longitude']),
                    map: map,
                    icon: base_url + '/img/marker.png',
                    labelContent: pictureLabel,
                    labelAnchor: new google.maps.Point(50, 0),
                    labelClass: "marker-style",
                });
                newMarkers.push(marker);
                boxText.innerHTML =
                    '<div class="thumbnail_one thumbnail-map">' +
						'<div class="image_area overlay_one overfollow">' +
                         '<a href="' + locations[i]['view_url'] + '">' +
							'<img src="' + locations[i]['image'] + '" alt="">' +
							'</a>' +
							'<div class="sale sale_position bg-primary">' + locations[i]['mode'] + '</div>' +
                '<div class="area_price price_position">' + locations[i]['price'] + ' <span>' + locations[i]['unit_size'] +  '</span></div>' +
						'</div>' +
						'<div class="thum_one_content">' +
							'<div class="thum_title color-secondery pb-4">' +
								'<h6 class="hover_primary"><a href="' + locations[i]['view_url'] + '">' + locations[i]['title'] + '</a></h6>' +
                '<span><i class="fa fa-map-marker" aria-hidden="true"></i>' + locations[i]['full_address'] + '</span>' +
							'</div>' +
						'</div>' +
					'</div>';
                //Define the infobox
                newMarkers[i].infobox = new InfoBox(infoboxOptions);
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        for (let h = 0; h < newMarkers.length; h++) {
                            newMarkers[h].infobox.close();
                        }
                        newMarkers[i].infobox.open(map, this);
                    }
                })(marker, i));

            }
            let clusterStyles = [
                {
                    url: base_url+'/img/map_marker.png',
                    height: 60,
                    width: 60
                }
            ];
            let markerCluster = new MarkerClusterer(map, newMarkers, {styles: clusterStyles, maxZoom: 15});
            $('body').addClass('loaded');
            setTimeout(function() {
                $('body').removeClass('has-fullscreen-map');
            }, 1000);
            $('#map').removeClass('fade-map');

            //  Dynamically show/hide markers --------------------------------------------------------------

            google.maps.event.addListener(map, 'idle', function() {

                for (let i=0; i < result.locations.length; i++) {
                    if ( map.getBounds().contains(newMarkers[i].getPosition()) ){
                        newMarkers[i].setVisible(true); // <- Uncomment this line to use dynamic displaying of markers

                        newMarkers[i].setMap(map);
                        markerCluster.setMap(map);
                    } else {
                        newMarkers[i].setVisible(false); // <- Uncomment this line to use dynamic displaying of markers

                        newMarkers[i].setMap(null);
                        markerCluster.setMap(null);
                    }
                }
            });
            google.maps.event.addListener(map, 'dragend', function (evt) {
                alert(`latitude is ${evt.latLng.lat().toFixed(3)} and longitude is ${evt.latLng.lng().toFixed(3) }`);
                document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
            });
            // Function which set marker to the user position
            function success(position) {
                let center = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.panTo(center);
                $('#map').removeClass('fade-map');
            }
            toast('success', result.message, 'top-right');
        }
        $.fn_ajax(url,params,fn_success,fn_error);
        // Enable Geo Location on button click
        $('.geo-location').on("click", function() {
            if (navigator.geolocation) {
                $('#map').addClass('fade-map');
                navigator.geolocation.getCurrentPosition(success);
            } else {
                error('Geo Location is not supported');
            }
        });
    }
}



})(jQuery);
