<?php

include "../connect.php";
$search = filterRequest("search");

getAllData("items_view" , "it_name like '%$search%' or it_name_ar like '%$search%' ")


?>

