<?php
 session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品管理</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
</head>

<body>
    <?php include './bd_header.php';?>

    <main>
        <div class="container mt-3">
            <h2>商品管理</h2>
            <form action="../api/insert.php" method="post">
                <div class="mb-3 mt-3">
                    <label for="item_no">商品編號:</label>
                    <input type="text" class="form-control" id="item_no" name="item_no">
                </div>

                <div class="mb-3 mt-3">
                    <label for="item_name">商品名稱:</label>
                    <input type="text" class="form-control" id="item_name" name="item_name">
                </div>

                <div class="mb-3 mt-3">
                    <label for="price">價格:</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>

                <div class="mb-3 mt-3">
                    <label for="cost">成本:</label>
                    <input type="number" class="form-control" id="cost" name="cost">
                </div>

                <div class="mb-3 mt-3">
                    <label for="bg_date">上架日:</label>
                    <input type="date" class="form-control" id="bg_date" name="bg_date">
                </div>

                <div class="mb-3 mt-3">
                    <label for="ed_date">下架日:</label>
                    <input type="date" class="form-control" id="ed_date" name="ed_date">
                </div>

                <div class="mb-3 mt-3">
                    <div class="row">
                        <button type="submit" class="btn btn-primary">新增</button>&nbsp;&nbsp;<button type="reset"
                            class="btn btn-primary">重置</button>
                    </div>
                </div>
                <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            </form>
        </div>
    </main>

    
</body>

</html>