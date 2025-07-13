<?php
 session_start();
 include_once "../api/db.php";
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>帳號管理</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
    body {
        background: linear-gradient(135deg, #f3e5f5 0%, #fff8e1 100%);
        min-height: 100vh;
        font-family: 'Noto Sans TC', sans-serif;
    }
    .admin-card {
        max-width: 700px;
        margin: 60px auto 0 auto;
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 8px 32px rgba(44,85,48,0.10);
        padding: 2.5rem 2rem 2rem 2rem;
    }
    .admin-title {
        text-align: center;
        color: #2c5530;
        font-weight: 700;
        margin-bottom: 2rem;
        letter-spacing: 2px;
        font-size: 2rem;
    }
    .btns {
        text-align: right;
        margin-bottom: 1rem;
    }
    .btn-primary {
        background: linear-gradient(135deg, #2c5530, #4a7c59);
        border: none;
        font-weight: 600;
        border-radius: 8px;
        font-size: 1.1rem;
        padding: 8px 24px;
        transition: all 0.2s;
    }
    .btn-primary:hover {
        background: #2c5530;
    }
    .btn-warning, .btn-danger {
        border-radius: 8px;
        font-weight: 600;
        font-size: 1rem;
        margin-right: 0.5rem;
    }
    .table th {
        background: linear-gradient(135deg, #2c5530, #4a7c59);
        color: #fff;
        text-align: center;
        vertical-align: middle;
    }
    .table td {
        text-align: center;
        vertical-align: middle;
        background: #f8f9fa;
    }
    </style>
</head>
<body>
<div class="admin-card">
    <h2 class="admin-title">帳號管理</h2>
    <?php $table='admin'?>
    <div class='btns'>
        <a class="btn btn-primary" href="add_admin.php?table=<?=$table;?>">
            <i class="fa-regular fa-pen-to-square"></i> 新增
        </a>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>帳號</th>
                <th>密碼</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php                       
             $rows=${ucfirst($table)}->all();         
             foreach ($rows as $row): 
            ?>
            <tr>
                <td><?=$row['acc'];?></td>
                <td><?=$row['pw'];?></td>
                <td>
                    <a class="btn btn-warning" href="update_admin.php?id=<?=$row['id'];?>&table=<?=$table;?>">
                        <i class="fa-solid fa-wrench"></i> 修改</a>
                    <a class="btn btn-danger" href="../api/delete.php?id=<?=$row['id'];?>&table=<?=$table;?>">
                        <i class="fa-solid fa-trash-can"></i> 刪除</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.bundle.min.js"
    integrity="sha512-Tc0i+vRogmX4NN7tuLbQfBxa8JkfUSAxSFVzmU31nVdHyiHElPPy2cWfFacmCJKw0VqovrzKhdd2TSTMdAxp2g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
