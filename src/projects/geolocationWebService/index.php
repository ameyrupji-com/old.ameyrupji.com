<html id="remove">
<div id="test">
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=&sensor=false"></script>
<script type="text/javascript" src="http://maps.gstatic.com/intl/en_us/mapfiles/400d/maps2.api/main.js"></script>
<script type="text/javascript">
function getLocation(lat, lang)
{
	geocoder = new google.maps.Geocoder();
	var latlng = new google.maps.LatLng(lat, lang);
	geocoder.geocode( { 'latLng': latlng}, 
		function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				var street = "";
				var route = ""
				var area_level_1 ="";
				var area_level_2 ="";
				var area_level_3 ="";
				var country ="";
				for( var i in results[0].address_components)
				{
					if(results[0].address_components[i].types.indexOf("street_number") >= 0) {
						street = results[0].address_components[i].long_name;
					}
					if(results[0].address_components[i].types.indexOf("route") >= 0) {
						route = results[0].address_components[i].long_name;
					}
					if(results[0].address_components[i].types.indexOf("administrative_area_level_1") >= 0) {
						area_level_1 = results[0].address_components[i].long_name;
					}
					if(results[0].address_components[i].types.indexOf("administrative_area_level_2") >= 0) {
						area_level_2 = results[0].address_components[i].long_name;
					}
					if(results[0].address_components[i].types.indexOf("administrative_area_level_2") >= 0) {
						area_level_3 = results[0].address_components[i].long_name;
					}
					if(results[0].address_components[i].types.indexOf("country") >= 0) {
						country = results[0].address_components[i].long_name;
					}
				}
				var state = area_level_1;
				if(area_level_3 != area_level_2)
					city = area_level_3 + ", " + area_level_2;
				else
					city = area_level_2;
				
				var jsonObj = { "status": "OK", "results": [ {
								"street": street +" " + route, 
								"city": city ,
								"state": state ,
								"country": country }]};		
				var jsonstr=JSON.stringify(jsonObj);
				document.getElementById("test").outerHTML=jsonstr;
			} 
			else {
				alert("Geocode was not successful for the following reason: " + status);
			}
		}
	);
}
</script>
<?php 
	$latitude = $_GET['lat'];
	$longitude = $_GET['lang'];
	printf("<script type='text/javascript'>window.onload=function(){getLocation(%e,%e)}</script>",$latitude,$longitude);
	// http://stackoverflow.com/questions/2054635/reverse-geocoding-with-google-map-api-and-php-to-get-nearest-location-using-lat	
?>
</div>

</html>
