<?php
// set your API key here
$api_key = "";
// format this string with the appropriate latitude longitude
$url = '//maps.googleapis.com/maps/api/geocode/json?latlng=40.714224,-73.961452&sensor=false';
// make the HTTP request
$data = @file_get_contents($url);
// parse the json response
$jsondata = json_decode($data,true);
// if we get a placemark array and the status was good, get the addres
if(is_array($jsondata )&& $jsondata ['Status']['code']==200)
{
      $addr = $jsondata ['Placemark'][0]['address'];
	  echo $addr;
}
?>