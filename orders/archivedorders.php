<?php

include "../connect.php";
$user_id = filterRequest("user_id");

getAllData("orders_view" , "order_user_id = '$user_id' AND order_status='archived' ORDER BY order_datetime DESC" );

?>