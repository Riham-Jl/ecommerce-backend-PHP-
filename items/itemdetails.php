<?php

include "../connect.php";
$item_id = filterRequest("item_id");

getAllData("subitems_view" , "sub_item_id= '$item_id' " );


?>

