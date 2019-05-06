var lat;
var lang;
var position = "";
var loc;
var geocoder = new google.maps.Geocoder();
var latlng;

function getLocation()
{
	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition( function (position) {
			lat = position.coords.latitude;
			lng = position.coords.longitude;
			
			latlng = new google.maps.LatLng(lat, lng);

			geocoder.geocode( { 'latLng': latlng}, function(results, status) {
			  if (status == google.maps.GeocoderStatus.OK) {
				position = results[3].formatted_address;
				loc = results[0].geometry.location;
				return (1);
			  } 
			  else {
				return (0);
			  }
			});
		});
		return (0);
	}
}

function updateLocation(div,divLocation, divMap)
{
	if(!position) {
		var result = getLocation();
		if (result == 1) {
			$(divLocation).removeClass('off').addClass('on');
			$(div).css('display','inline');
			if(divMap != "") {
				var myOptions = {
					zoom: 8,
					center: latlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
				map.setCenter(loc);
				var marker = new google.maps.Marker({
					map: map,
					position: loc
				});
			}
		}
	}
	$(div+' img').css('display','none');
	$(div+' .text').html(position);
	$(div).append("<input type='hidden' value='"+ position +"' id='location' name='location'>");
}