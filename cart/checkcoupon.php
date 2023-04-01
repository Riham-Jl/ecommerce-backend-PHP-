<?php

include "../connect.php";
$coupon = filterRequest("coupon");
$now = date("Y-m-d H:i:s");
$data = getData("coupon" , "coup_name = '$coupon' and coup_expire> '$now' and coup_count > 0"  );



?>