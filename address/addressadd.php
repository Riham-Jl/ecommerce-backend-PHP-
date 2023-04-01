<?php 

include "../connect.php" ;

$user_id  = filterRequest("user_id") ; 
$name = filterRequest("name") ;
$city  = filterRequest("city") ; 
$street = filterRequest("street") ;
$building  = filterRequest("building") ; 
$lat = filterRequest("lat") ;
$long  = filterRequest("long") ; 




$data = array (
    "address_user_id" => $user_id,
    "address_name" => $name,
    "address_city" => $city,
    "address_street" => $street,
    "address_building" => $building,
    "address_lat" => $lat,
    "address_long" => $long,
);

insertData("adress" , $data);
?>