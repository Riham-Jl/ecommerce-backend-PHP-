<?php 

include "../connect.php" ;

$user_id  = filterRequest("user_id") ; 

$item_id = filterRequest("item_id") ; 

$data = array (
    "fav_item_id" => $item_id,
    "fav_user_id" => $user_id
);
insertData("favorites" , $data);
?>