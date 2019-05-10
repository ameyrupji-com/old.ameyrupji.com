function getLocation()
{
	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition( function (position) {
			$('.locationName').css('display','inline');
			$('.locationName .text').html('Reading Device Location...');
		
			$('.location').removeClass('off').addClass('on');
			$('.locationName .text').html('Updating Location...');
			
			var lat = position.coords.latitude;
			var lng = position.coords.longitude;
			
			geocoder = new google.maps.Geocoder();
			var latlng = new google.maps.LatLng(lat, lng);
			/*var myOptions = {
			  zoom: 8,
			  center: latlng,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);*/

			geocoder.geocode( { 'latLng': latlng}, function(results, status) {
			  if (status == google.maps.GeocoderStatus.OK) {
				/*map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});*/
				$('.locationName img').css('display','none');
				$('.locationName .text').html(results[3].formatted_address);
			  } else {
				alert("Geocode was not successful for the following reason: " + status);
			  }
			});
		});
	}
	else
	{
		$('.locationName img').css('display','none');
		$('.locationName .text').html('');
	}
}