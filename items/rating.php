<?php

include "../connect.php";
$item_id = filterRequest("item_id");
$user_id = filterRequest("user_id");
$rate = filterRequest("rate");
$comment = filterRequest("comment");

    global $con;
    $stmt = $con->prepare("SELECT  * FROM rating WHERE  rating_item_id = '$item_id' AND rating_user_id = '$user_id'" );
    $stmt->execute();
    $count  = $stmt->rowCount();

if ($count > 0) {
    $data = array (
        "rating_rate" => $rate,
        "rating_comment" => $comment
    );
    updateData("rating" , $data , "rating_item_id = '$item_id' AND rating_user_id = '$user_id'" );

    } else {
        $data = array (
            "rating_rate" => $rate,
            "rating_item_id" => $item_id,
            "rating_user_id" => $user_id,
            "rating_comment" => $comment
        );
        insertData("rating" , $data );
    }
    

?>

