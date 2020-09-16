
//google.maps.event.addDomListener(window, 'load', init(_latitude, _longitude));

function init(_latitude, _longitude) {
	var mapOptions = {
		zoom: 18,
		center: new google.maps.LatLng(_latitude, _longitude), // New York
		styles: [
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
				]
	};

	var mapElement = document.getElementById('map');
	var base_url = $('meta[name="base-url"]').attr('content');
	var icon_url = base_url + '/img/map_marker.png';
	var map = new google.maps.Map(mapElement, mapOptions);
	var geocoder = new google.maps.Geocoder();
	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(_latitude, _longitude),
		map: map,
		icon: icon_url,
		title: 'Point to a place, to get location',
		draggable: true
	});
	google.maps.event.addListener(marker, 'dragend', function (evt) {
		document.getElementById('latitude').value = evt.latLng.lat();
		document.getElementById('longitude').value = evt.latLng.lng();
		geocoder.geocode({'latLng': evt.latLng},function(result,status){
			if (status ==google.maps.GeocoderStatus.OK) 
			{
				document.getElementById('address').value = result[0].formatted_address;
			}
			 else 
			 {
				alert('Geocoder failed due to: ' + status);
			 }
		})
	});
}
