<?php 

include "../connect.php" ;

$address_id  = filterRequest("address_id") ; 



deleteData("adress" , "address_id = $address_id");

?>