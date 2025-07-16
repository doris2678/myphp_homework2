<?php
 session_start(); 
 include_once "./api/db.php";
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>泰好喝手搖飲料專賣店</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php include "title_link.php" ?>
    <style>
    .carousel-item img {
        height: 400px;
        object-fit: cover;
    }

    .card-img-top img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }
    </style>
</head>

<body>
    <?php include 'header.php';?>

    <!-- 首頁區塊 -->
    <section id="home" class="hero">
        <!-- 輪播圖片 -->
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <?php
                    $table = 'first_img';
                    $rows = ${ucfirst($table)}->all(" where sh=1");
                    $first = true;
                    foreach ($rows as $row):
                ?>
                <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                    <img src="./images/<?=$row['img'];?>" class="d-block w-100" alt="<?=$row['pd1'];?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h2><?=$row['pd1'];?></h2>
                        <p><?=$row['pd2'];?></p>
                        <button class="btn btn-primary">立即訂購</button>
                    </div>
                </div>
                <?php
                    $first = false;
                    endforeach;
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <div class="carousel-indicators">
                <?php
                    $rows = ${ucfirst($table)}->all(" where sh=1");
                    foreach (array_keys($rows) as $index):
                ?>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="<?php echo $index; ?>"
                    class="<?php echo $index === 0 ? 'active' : ''; ?>"
                    aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                    aria-label="Slide <?php echo $index + 1; ?>"></button>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 產品介紹區塊 -->
    <section id="products" class="products py-5">
        <div class="container">
            <h2 class="text-center mb-3">熱門產品</h2>
            <p class="text-center mb-4">精選最受歡迎的飲品，每一杯都是用心調製</p>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                    $table = 'second_img';
                    $rows = ${ucfirst($table)}->all(" where sh=1");
                    foreach ($rows as $row):
                ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-img-top">
                            <img src="./images/<?=$row['img'];?>" class="img-fluid" alt="<?=$row['pd1'];?>">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><?=$row['pd1'];?></h3>                            
                            <p class="card-text"><?=$row['pd2'];?></p>
                            <a href="shopping_car.php" class="btn btn-primary">我要購買</a>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
    </section>

    <!-- 特色介紹 -->
    <section class="features py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <i class="fas fa-leaf fa-3x mb-3"></i>
                            <h3 class="card-title">天然原料</h3>
                            <p class="card-text">嚴選天然原料，無人工添加物，健康美味</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <i class="fas fa-clock fa-3x mb-3"></i>
                            <h3 class="card-title">快速製作</h3>
                            <p class="card-text">專業調製，3分鐘內完成，新鮮現做</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <i class="fas fa-heart fa-3x mb-3"></i>
                            <h3 class="card-title">用心服務</h3>
                            <p class="card-text">親切服務，客製化調整，滿足您的需求</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <!-- Custom script (may need adjustments for Bootstrap carousel compatibility) -->
    <!-- <script src="script.js"></script> -->

    <?php include 'footer.php'; ?>
</body>

</html>