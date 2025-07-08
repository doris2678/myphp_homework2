<?php
// 連線資料庫
$dsn="mysql:host=localhost;dbname=taieat;charset=utf8";
$pdo = new PDO($dsn,'root','');

// 取得 JSON 資料
$data = json_decode(file_get_contents("php://input"), true);

$customer_name = $data['customer_name'];
$cart = $data['cart'];

try {
    // 開始交易
    $pdo->beginTransaction();

    // 新增訂單
    $stmt = $pdo->prepare("INSERT INTO orders (customer_name) VALUES (?)");
    $stmt->execute([$customer_name]);
    $order_id = $pdo->lastInsertId();

    // 新增每個商品
    $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
    foreach ($cart as $item) {
        $stmt->execute([$order_id, $item['product_name'], $item['quantity'], $item['price']]);
    }

    $pdo->commit();

    echo json_encode(["status" => "success", "message" => "訂單已儲存"]);
} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(["status" => "error", "message" => "儲存失敗: " . $e->getMessage()]);
}
?>
