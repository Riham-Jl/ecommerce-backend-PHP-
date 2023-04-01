<?php

include "../connect.php";
$order_id = filterRequest("order_id");
$delete = deleteData("orders" , "order_id = '$order_id' AND order_status='pending'" , false  );

if($delete>0){
deleteData("cart" , "cart_order = '$order_id' " );
}
else {
    echo json_encode(array("status" => "failure"));
}
?>