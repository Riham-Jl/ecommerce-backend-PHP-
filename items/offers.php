<?php

include "../connect.php";
$user_id = filterRequest("user_id");


    global $con;
    $data = array();
    $stmt = $con->prepare("SELECT items_view.* , 1 as favorite from items_view
    INNER JOIN 
    favorites on items_view.it_id = favorites.fav_item_id AND favorites.fav_user_id= $user_id
    where it_discount>0 AND it_active =1
    UNION ALL
    SELECT items_view.* , 0 as favorite FROM items_view
    WHERE it_discount>0 AND it_active =1 AND it_id NOT IN
    (SELECT items_view.it_id from items_view INNER JOIN favorites on items_view.it_id = favorites.fav_item_id AND favorites.fav_user_id= $user_id);");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if ($count > 0) {
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        echo json_encode(array("status" => "failure"));
    }

?>