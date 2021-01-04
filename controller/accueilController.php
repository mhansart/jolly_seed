<?php
/*
$data = array(
  'street'     => '5 Avenue Anatole',
  'postalcode' => '75007',
  'city'       => 'Paris',
  'country'    => 'france',
  'format'     => 'json',
);

function geocode($address){ 

    // url encode the address 
    $address = urlencode($address); 

    $url = "http://nominatim.openstreetmap.org/?format=json&addressdetails=1&q={$address}&format=json&limit=1"; 
    
    // get the json response 
    $resp_json = file_get_contents($url); 

    // decode the json 
    $resp = json_decode($resp_json, true); 

    return array($resp[0]['lat'], $resp[0]['lon']); 

} 

$coordonnees = geocode("Paris");
var_dump($coordonnees);

*/
include("view/page/accueil.php");
