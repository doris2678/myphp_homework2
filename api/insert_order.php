<?php
    session_start();
    include "db.php";

    // 取得 JSON 資料
    $data = json_decode(file_get_contents("php://input"), true);

    //order1
    $date1 = $data['date1'];
    $name = $data['name'];
    $amt = $data['amt'];    
    $tel = $data['tel'];    
    $array=['date1'=>$date1,'name'=>$name,'amt'=>$amt,'tel'=>$tel];    

    //order2
    $mydata = $data['mydata'];
    $Order1->save($array);

    foreach ($mydata as $item) {
        $Order2->save($item);
    }

    header("Content-Type: application/json;");
    echo json_encode(["status" => "success", "message" => "訂單已儲存"]);    
?>
