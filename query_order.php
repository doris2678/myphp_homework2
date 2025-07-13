<?php
 session_start();
 include_once "./api/db.php";
 ?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>訂單查詢</title>
    <?php include "title_link.php" ?>

    <style>
    .order-section {
        margin-top: 120px;
        padding: 40px 20px;
        min-height: calc(100vh - 120px);
        background: linear-gradient(135deg, #fff8e1 0%, #f3e5f5 100%);
    }

    .order-container {
        max-width: 1200px;
        margin: 0 auto;
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .order-title {
        text-align: center;
        color: #2c5530;
        margin-bottom: 30px;
        font-size: 2.5rem;
        font-weight: 700;
    }

    .order-subtitle {
        text-align: center;
        color: #666;
        margin-bottom: 40px;
        font-size: 1.2rem;
    }

    .order-table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
        background: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .order-table th,
    .order-table td {
        padding: 15px;
        border: 1px solid #dee2e6;
        text-align: center;
        vertical-align: middle;
    }

    .order-table th {
        background: linear-gradient(135deg, #2c5530, #4a7c59);
        color: white;
        font-weight: 600;
    }

    .order-table tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .order-table tr:hover {
        background-color: #e8f4ff;
    }

    .order-status {
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-processing {
        background: #cce5ff;
        color: #004085;
    }

    .status-completed {
        background: #d4edda;
        color: #155724;
    }

    .status-cancelled {
        background: #f8d7da;
        color: #721c24;
    }

    .btn-details {
        background: linear-gradient(135deg, #2c5530, #4a7c59);
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-details:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(44, 85, 48, 0.3);
        color: white;
        text-decoration: none;
    }

    .no-orders {
        text-align: center;
        padding: 50px;
        color: #666;
        font-size: 1.2rem;
    }

    .no-orders i {
        font-size: 3rem;
        color: #ddd;
        margin-bottom: 20px;
    }
    </style>
</head>

<body>
    <?php include 'header.php';?>

    <section class="order-section">
        <div class="order-container">
            <h2 class="order-title">訂單查詢</h2>
            <p class="order-subtitle">查看您的訂單記錄</p>

            <?php
            // 檢查用戶是否已登入
            if(isset($_SESSION['mem'])) {
                $member_acc = $_SESSION['mem'];
                
                // 查詢該會員的訂單
                $orders = $Order1->all(['acc' => $member_acc]);
                
                if(count($orders) > 0) {
                    echo '<table class="order-table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>訂單編號</th>';
                    echo '<th>訂購日期</th>';
                    echo '<th>訂購人</th>';
                    echo '<th>電話</th>';
                    echo '<th>總金額</th>';                    
                    echo '<th>操作</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    
                    foreach($orders as $order) {                                              
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($order['or_no']) . '</td>';
                        echo '<td>' . htmlspecialchars($order['date1']) . '</td>';
                        echo '<td>' . htmlspecialchars($order['name']) . '</td>';
                        echo '<td>' . htmlspecialchars($order['tel']) . '</td>';
                        echo '<td>NT$ ' . number_format($order['amt']) . '</td>';                        
                        echo '<td><a href="#" class="btn-details" onclick="viewOrderDetails(\'' . $order['or_no'] . '\')">查詢明細</a></td>';
                        echo '</tr>';
                    }
                    
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<div class="no-orders">';
                    echo '<i class="fas fa-clipboard-list"></i>';
                    echo '<p>您還沒有任何訂單記錄</p>';
                    echo '<p>快去購物車下單吧！</p>';
                    echo '</div>';
                }
            } else {
                echo '<div class="no-orders">';
                echo '<i class="fas fa-user-lock"></i>';
                echo '<p>請先登入會員以查看訂單記錄</p>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script>
    // function viewOrderDetails(orderNo) {
    //     // 這裡可以添加查看訂單詳情的邏輯
    //     alert('查看訂單 ' + orderNo + ' 的詳情');
    //     // 可以彈出模態框或跳轉到詳情頁面
    // }
    </script>
</body>

</html>