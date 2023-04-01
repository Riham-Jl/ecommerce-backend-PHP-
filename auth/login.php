<?php

include "../connect.php";
 
$email = filterRequest("email");
$password = sha1($_POST["password"]);

$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? AND  users_password = ?");
$stmt->execute(array($email, $password));
$count = $stmt->rowCount();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($count>0){
    $approve = $data['users_approve'];
   
   if ($approve==1){

    echo json_encode(array("status" => "success", "data" => $data));
    }
   else {
    printFailure("verify");
    }
}
else {
    printFailure("uncorrect");
}