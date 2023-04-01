<?php

include "../connect.php";
$user_id = filterRequest("user_id");

$categories = getAllData("favorites_view" , "fav_user_id = $user_id" );



?>