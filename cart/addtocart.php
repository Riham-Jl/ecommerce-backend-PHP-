<?php 

include "../connect.php" ;

$user_id  = filterRequest("user_id") ; 

$item_id = filterRequest("item_id") ; 
$sub_item_id = filterRequest("sub_item_id") ; 



$stmt = $con->prepare("SELECT sub_count From subitems where sub_id = '$sub_item_id'");
$stmt->execute();
$item_count = $stmt->fetchColumn();
if($item_count >0){

$stmt = $con->prepare("UPDATE  subitems SET sub_count = sub_count-1 WHERE sub_id = '$sub_item_id'");
$stmt->execute();

$stmt = $con->prepare("UPDATE  items SET it_count = it_count-1 WHERE it_id = '$item_id'");
$stmt->execute();


$data = array (
    "cart_item_id" => $sub_item_id,
    "cart_user_id" => $user_id
);

insertData("cart" , $data);
}
else {
    printFailure("count");
}
?>