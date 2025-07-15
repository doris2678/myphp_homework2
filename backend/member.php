<?php
 session_start();
 include_once "../api/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>會員管理</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <style>
    .table-fixed {
        table-layout: fixed;
        width: 100%;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        background: #fff;
    }
    .table-fixed th {
        background: #3b5998;
        color: #fff;
        font-weight: bold;
        border-bottom: 2px solid #2d4373;
        font-size: 1.08rem;
    }
    .table-fixed th,
    .table-fixed td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-align: center;
        vertical-align: middle;
        padding: 12px 8px;
    }
    .table-fixed tbody tr {
        transition: background 0.2s;
    }
    .table-fixed tbody tr:hover {
        background: #f0f4fa;
    }
    .btn {
        border-radius: 8px !important;
        box-shadow: 0 2px 8px rgba(59,89,152,0.08);
        transition: background 0.2s, box-shadow 0.2s;
        font-weight: 500;
    }
    .btn-warning {
        background: #ffb347;
        border: none;
        color: #fff;
    }
    .btn-warning:hover {
        background: #ff9800;
        color: #fff;
        box-shadow: 0 4px 16px rgba(255,152,0,0.12);
    }
    .btn-danger {
        background: #e74c3c;
        border: none;
        color: #fff;
    }
    .btn-danger:hover {
        background: #c0392b;
        color: #fff;
        box-shadow: 0 4px 16px rgba(231,76,60,0.12);
    }
    th,
    td{
        text-align:center;
    }
    </style>
       

</head>

<body>
    <?php include 'bd_header.php';?>

    <main>
        <div class="container mt-3">
            <h2 class="text-center">會員管理</h2>
            <?php $table='member';?>     
            
            <table class="table table-bordered table-hover table-fixed">
                <thead>
                    <tr>
                        <th>使用者名稱</th>
                        <th>電子郵件</th>
                        <th>帳號</th>
                        <th>密碼</th>
                        <th>生日</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                     $rows=${ucfirst($table)}->all();         
                     foreach ($rows as $row): 
                    ?>
                    <tr>
                        <td><?=$row['name'];?></td>
                        <td><?=$row['email'];?></td>
                        <td><?=$row['acc'];?></td>
                        <td><?=$row['pw'];?></td>
                        <td><?=$row['birthday'];?></td>
                        <td>
                            <a class="btn btn-warning" href="update_member.php?id=<?=$row['id'];?>&table=<?=$table;?>">
                                <i class="fa-solid fa-wrench"></i>修改</a>
                            <a class="btn btn-danger" href="../api/delete.php?id=<?=$row['id'];?>&table=<?=$table;?>"><i
                                    class="fa-solid fa-trash-can"></i>刪除</a>
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>

        </div>
        </div>
    </main>    

</body>

</html>