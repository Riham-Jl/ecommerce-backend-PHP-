<?php

include "../connect.php";

$user_id = filterRequest("user_id");
$payment_method = filterRequest("payment_method");
$delivery = filterRequest("delivery");
$address_id = filterRequest("address_id");
$delivery_price = filterRequest("delivery_price");
$coupon_id = filterRequest("coupon_id");
$order_price = filterRequest("order_price");

$totalprice = $order_price + $delivery_price;

$couponOk = false;



if($coupon_id!="0"){
    $now = date("Y-m-d H:i:s");
$stmt = $con->prepare("SELECT coup_discount FROM coupon WHERE coup_id = '$coupon_id' and coup_expire> '$now' and coup_count > 0 ");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $coupondiscount = $stmt->fetchColumn();
    $order_price_disounted = $order_price-$order_price * $coupondiscount/100;
    $totalprice = $order_price_disounted + $delivery_price;
    $stmt = $con->prepare("UPDATE  coupon SET coup_count = coup_count-1 WHERE coup_id = '$coupon_id'");
    $stmt->execute();
    $couponOk=true;

   


    } else {
        printFailure("coupon");
    }
}
else {
    $couponOk = true;
}



if($couponOk){

$data = array(
    "order_user_id" => $user_id,
    "order_payment_method" =>  $payment_method,
    "oreder_delivery" => $delivery,
    "order_address_id" => $address_id,
    "order_delivery_price" => $delivery_price ,
    "order_coupon_id" => $coupon_id,
    "order_total_price" => $totalprice,
);



$count = insertData("orders" , $data , false) ; 

if($count>0){
    $stmt = $con->prepare("SELECT max(order_id) FROM orders WHERE order_user_id = '$user_id' ");
    $stmt->execute();
    $order_id = $stmt->fetchColumn();

    $newdata = array (
        "cart_order" => $order_id
     );

updateData("cart" , $newdata , "cart_user_id = '$user_id' AND cart_order = '0' " );

}
else {
    printFailure();
}

}


?>