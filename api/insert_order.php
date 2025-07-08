<?php
    session_start();
    include "db.php";

    // 取得 JSON 資料
    $data = json_decode(file_get_contents("php://input"), true);
    
    $customer_name = $data['customer_name'];
    $mydata = $data['mydata'];

    $array=['name'=>$customer_name];    
    $Order1->save($array);

    foreach ($mydata as $item) {
        $Order2->save($item);
    }

    header("Content-Type: application/json;");
    echo json_encode(["status" => "success", "message" => "訂單已儲存"]);
?>
