<?php 

include "../connect.php" ;

$user_id  = filterRequest("user_id") ; 

$item_id = filterRequest("item_id") ; 
$sub_item_id = filterRequest("sub_item_id") ; 



$stmt = $con->prepare("UPDATE  subitems SET sub_count = sub_count+1 WHERE sub_id = '$sub_item_id'");
$stmt->execute();
$stmt = $con->prepare("UPDATE  items SET it_count = it_count+1 WHERE it_id = '$item_id'");
$stmt->execute();
deleteData("cart" , "cart_id = (SELECT cart_id FROM cart where cart_user_id = $user_id AND cart_item_id = $sub_item_id AND cart_order = '0' LIMIT 1);");
?>