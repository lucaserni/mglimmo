var ib = null;
function closebox(){
	ib.close();	
}

var $ = jQuery;


var map = null;
var markers = [];
function initThemeMap() {


	// set first marker
	$firstmarker = $('#cs-map').siblings('.marker').first();
	var lat = $firstmarker.data('lat');
	var lng = $firstmarker.data('lng');
	var geojson = [];

	var mapOptions = {
		zoom: 14,
		scrollwheel: false,
		center: new google.maps.LatLng(lat,lng),
		disableDefaultUI: false,
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.SMALL,
			position: google.maps.ControlPosition.LEFT_BOTTOM
		},
		mapTypeControlOptions: {
			mapTypeIds: ['gray_map', google.maps.MapTypeId.SATELLITE]
		}
	};

	// Map in Content
	var containerId = 'cs-map';
	map = new google.maps.Map(document.getElementById(containerId), mapOptions);

	// set gray style
	map.mapTypes.set('gray_map',
		new google.maps.StyledMapType([{stylers: [{saturation: -90}]}],
			{name: "Karte"}));
	map.setMapTypeId('gray_map');

	// set marker when map has loaded
	google.maps.event.addListenerOnce(map, 'tilesloaded', function(){
		setMarkers();
	});
}

/*if($('#cs-map').length > 0) {
	google.maps.event.addDomListener(window, 'load', initialize);	
}*/

function setMarkers() {
	var all_markers = $('#cs-map').siblings('.marker');
	deleteMarkers();
	var latlngbounds = new google.maps.LatLngBounds();

	$.each(all_markers, function(index, el) {
		lat = $(el).data('lat');
		lng = $(el).data('lng');
		
		if (lat && lng) {
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(lat, lng),
				map: map,
			});
			google.maps.event.addListener(marker, 'click', function() {
			    window.open("http://maps.google.com/maps?q=loc:" + lat + "," + lng + "", '_blank');
			});

			latlngbounds.extend(new google.maps.LatLng(lat, lng));

			markers.push(marker);
		}
	});
	if (all_markers.length > 1) {
		map.fitBounds(latlngbounds);
	};
}
	
// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
	clearMarkers();
	markers = [];
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
	setAllMap(null);
}

// Sets the map on all markers in the array.
function setAllMap(map) {
	for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(map);
	}
}
