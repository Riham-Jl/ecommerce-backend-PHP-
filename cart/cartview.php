<?php

include "../connect.php";
$user_id = filterRequest("user_id");

$data = getAllData("cart_view" , "cart_user_id = '$user_id' AND cart_order = '0'" , null , null );

if($data== 0){
}
else {
global $con;
    $countprice = array();
    $stmt = $con->prepare("SELECT COUNT(cart_id) AS totalcount , SUM(PriceItem) AS totalprice FROM cart_view
    WHERE cart_user_id = $user_id and cart_order = '0' ");
    $stmt->execute();
    $countprice = $stmt->fetch(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if ($count > 0) {
        echo json_encode(array("status" => "success", "data" => $data , "countprice" => $countprice));
    } else {
       
    }}

?>

