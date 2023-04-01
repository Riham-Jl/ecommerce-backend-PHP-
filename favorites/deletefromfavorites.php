<?php 

include "../connect.php" ;

$user_id  = filterRequest("user_id") ; 

$item_id = filterRequest("item_id") ; 


deleteData("favorites" , "fav_item_id = $item_id and fav_user_id = $user_id");
?>