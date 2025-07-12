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
</head>

<body>
    <?php include 'bd_header.php';?>

    <main>
        <div class="container mt-3">
            <h2 class="text-center">商品管理</h2>
            <?php $table='items'; ?>
            <div class='btns'><a class="btn btn-primary" href="add_items.php?table=<?=$table;?>"><i
                        class="fa-regular fa-pen-to-square"></i>新增</a>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>商品編號</th>
                        <th>商品名稱</th>
                        <th>價格</th>
                        <th>成本</th>
                        <th>上架日</th>
                        <th>下架日</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php                          
                     $rows=${ucfirst($table)}->all();         
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