<?php

include "../connect.php";
$user_id = filterRequest("user_id");
$item_id = filterRequest("item_id");




    global $con;
    $stmt = $con->prepare("SELECT COUNT(cart_id) AS count FROM cart
    WHERE cart_user_id = $user_id AND cart_item_id = $item_id AND cart_order = '0' ");
    $stmt->execute();
    $data = $stmt->fetchColumn();
    $count  = $stmt->rowCount();
    if ($count > 0) {
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        printFailure();
    }

?>

