<?php

include "../connect.php";
$user_id = filterRequest("user_id");

$categories = getAllData("adress" , "address_user_id = $user_id" );



?>