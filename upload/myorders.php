<?php

include "./connect.php";

$alldata = array();
$categories = getAllData("categories" , "1=1" , null , false);
$disounteditems = getAllData("items_view" , "it_discount>0 AND it_count>0 AND it_active=1" , null , false);

$alldata['status']='success';
$alldata['categories']=$categories;
$alldata['items'] = $disounteditems;



echo json_encode($alldata);

?>