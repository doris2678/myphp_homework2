<?php
 session_start();
 include_once "../api/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯商品資料</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style2.css">
</head>

<body>

    <?php include 'bd_header.php';?>

    <main>
        <div class="container mt-3">
            <h2 class="text-center">編輯商品資料</h2>
            <?php
                $table=$_GET['table'];
                $db=${ucfirst($table)};
                $row=$db->find($_GET['id']);                                 
                if (!$row) {
                    echo "<h2>帳號不存在</h2>";
                    exit;
                }
            ?>

            <form action="../api/update.php" method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="item_no">商品編號:</label>
                    <input type="text" class="form-control" id="item_no" name="item_no" value="<?=$row['item_no'];?>">
                </div>

                <div class="mb-3 mt-3">
                    <label for="item_name">商品名稱:</label>
                    <input type="text" class="form-control" id="item_name" name="item_name"
                        value="<?=$row['item_name'];?>">
                </div>

                <div class="mb-3 mt-3">
                    <label for="price">價格:</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?=$row['price'];?>">
                </div>

                <div class="mb-3 mt-3">
                    <label for="cost">成本:</label>
                    <input type="number" class="form-control" id="cost" name="cost" value="<?=$row['cost'];?>">
                </div>

                <div class="mb-3 mt-3">
                    <label for="sh">是否顯示:</label>
                    <input type="checkbox" name="sh" value="<?=$row['id'];?>" <?=($row['sh']==1)?"checked":"";?>>
                </div>
                
                <div class="mb-3 mt-3">
                    商品圖片：<img src="../images/<?=$row['img'];?>" alt='商品圖片預覽'
                        style='max-width: 200px; max-height: 200px;'>
                </div>
                <hr>  
                <div class="mb-3 mt-3 d-flex align-items-center">
                    <label for="img" class="me-2 mb-0" style="white-space: nowrap;">更新圖片：</label>
                    <input type="file" class="form-control" id="img" name="img" style="width: auto;">
                </div>
                  
                <!-- 更新圖片預覽 -->
                <div id="preview-container" class="mb-3 mt-3" style="display:none;">
                    <label for="preview-image" class="me-2 mb-0" style="white-space: nowrap;">更新圖片預覽</label>
                    <img id="preview-image" src="" alt="更新圖片預覽" style="max-width: 200px; max-height: 200px;">
                </div>

                <div class="mb-3 mt-3">
                    <div class="row">
                        <button type="submit" class="btn btn-primary">編輯</button>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            </form>
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