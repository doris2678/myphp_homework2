<?php
//include "./api/db.php";

$dsn="mysql:host=localhost;dbname=tieat;charset=utf8";
$pdo = new PDO($dsn,'root','');

// 取得 JSON 資料
$data = json_decode(file_get_contents("php://input"), true);

$customer_name = $data['customer_name'];
//$cart = $data['cart'];
$mydata = $data['mydata'];

try {
    // 開始交易
    $pdo->beginTransaction();

    // 新增訂單
    $stmt = $pdo->prepare("INSERT INTO order1 (name) VALUES (?)");
    $stmt->execute([$customer_name]);
    $order_id = $pdo->lastInsertId();

    // 新增每個商品
    $stmt = $pdo->prepare("INSERT INTO order2 (item_no, item_name,price,qty) VALUES (?, ?, ?, ?)");
    //foreach ($cart as $item) {
    foreach ($mydata as $item) {
        $stmt->execute([$item['item_no'], $item['item_name'], $item['price'], $item['qty']]);
    }

    $pdo->commit();

    echo json_encode(["status" => "success", "message" => "訂單已儲存"]);
} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(["status" => "error", "message" => "儲存失敗: " . $e->getMessage()]);
}
//header("Content-Type: application/json;");
//echo json_encode($_POST);
?>
