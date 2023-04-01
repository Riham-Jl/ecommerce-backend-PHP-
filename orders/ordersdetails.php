<?php

include "../connect.php";
$order_id = filterRequest("order_id");

 getAllData("ordersdetails_view" , "order_id = '$order_id'" );



?>

