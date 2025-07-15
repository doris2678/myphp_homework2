<?php
 session_start();
 include_once "../api/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>商品管理</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <style>
    main {
        margin-bottom: 80px;
    }
    img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        border: 2px solid #f0f0f0;
        background: #fff;
    }
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
    .btn-primary {
        background: #3b5998;
        border: none;
        color: #fff;
    }
    .btn-primary:hover {
        background: #2d4373;
        color: #fff;
        box-shadow: 0 4px 16px rgba(59,89,152,0.12);
    }
    .fixed-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background: #fff;
        padding: 10px 0;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        z-index: 100;
    }
    .pagination .page-link {
        border-radius: 8px !important;
        margin: 0 2px;
        color: #3b5998;
        border: 1px solid #e0e0e0;
        transition: background 0.2s, color 0.2s;
    }
    .pagination .page-item.active .page-link {
        background: #3b5998;
        color: #fff;
        border: 1px solid #3b5998;
    }
    .pagination .page-link:hover {
        background: #f0f4fa;
        color: #2d4373;
    }
    th,
    td{
        text-align:center;
    }
    .noclick {
      pointer-events: none;
    }
    </style>
</head>

<body>
    <?php include 'bd_header.php';?>

    <main>
        <div class="container-fluid mt-3">

            <h2 class="text-center">商品管理</h2>
            <?php $table='items'?>
            <div class='btns'><a class="btn btn-primary" href="add_items.php?table=<?=$table;?>"><i
                        class="fa-regular fa-pen-to-square"></i>新增</a>
            </div>
            <table class="table table-bordered table-hover table-fixed">
                <thead>
                    <tr>
                        <th style="width: 10%;">商品編號</th>
                        <th style="width: 10%;">商品名稱</th>
                        <th style="width: 10%;">價格</th>
                        <th style="width: 10%;">成本</th>                        
                        <th style="width: 10%;">上架日</th>
                        <th style="width: 10%;">下架日</th>
                        <th style="width: 10%;">商品圖</th>
                        <th style="width: 10%;">是否顯示</th>
                        <th style="width: 10%;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php             
                     $all=count(${ucfirst($table)}->all());
                     $div=8;
                     $pages=ceil($all/$div);
                     $now=$_GET['p']??1;
                     $start=($now-1)*$div;
                     $rows=${ucfirst($table)}->all(" limit $start,$div");
                     //$rows=${ucfirst($table)}->all();         
                     foreach ($rows as $row): 
                    ?>
                    <tr>
                        <td><?=$row['item_no'];?></td>
                        <td><?=$row['item_name'];?></td>
                        <td><?=$row['price'];?></td>
                        <td><?=$row['cost'];?></td>
                        <td><?=$row['bg_date'];?></td>
                        <td><?=$row['ed_date'];?></td>                      
                        <td>
                            <img src="../images/<?=$row['img'];?>" style='max-width: 200px; max-height: 200px;'>
                        </td>
                        <td>                            
                          <input type="checkbox" class="noclick" name="sh" value="<?=$row['id'];?>" <?=($row['sh']==1)?"checked":"";?>>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="update_items.php?id=<?=$row['id'];?>&table=<?=$table;?>">
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

            <!-- 分頁 -->
            <div class="fixed-footer">
                <div class="container mt-3">
                    <ul class="pagination justify-content-center">
                        <?php if($now-1>0): ?>
                         <li class="page-item"><a class="page-link" href="?p=<?=$now-1;?>"><</a></li>
                        <?php endif ;?>

                        <?php for($i=1;$i<=$pages;$i++): ?>
                         <li class="page-item <?=($now==$i)?'active':'';?>"><a class="page-link"
                                href="?p=<?=$i;?>"><?=$i;?></a></li>
                        <?php endfor;?>

                        <?php if($now+1<=$pages):?>
                         <li class="page-item"><a class="page-link" href="?p=<?=$now+1;?>">></a></li>
                        <?php endif ;?>
                    </ul>
                </div>
            </div>

        </div>
        </div>
    </main>

    <script>
    $(document).ready(function() {
        previewImg = $('#img');

        previewImg.change(function(event) {
            const file = event.target.files[0];
            if (!file) return;

            // 顯示圖片預覽區塊
            $('#preview-container').show();

            const reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        });
    });
    </script>


</body>

</html>