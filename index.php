<?php
 session_start(); 
 ?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>泰好喝手搖飲料專賣店</title>
    <?php include "title_link.php" ?>
</head>

<body>
    <?php include 'header.php';?>

    <!-- 首頁區塊 -->
    <section id="home" class="hero">
        <!-- 輪播圖片 -->
        <div class="carousel">
            <div class="carousel-container">
                <div class="carousel-slide active">
                    <img src="./images/drink-1.jpg" alt="芒果冰沙">
                    <div class="carousel-content">
                        <h2>芒果冰沙</h2>
                        <p>嚴選當季新鮮水果，每一口都是自然的甜美</p>
                        <button class="cta-button">立即訂購</button>
                    </div>
                </div>
                <div class="carousel-slide">
                    <img src="./images/drink-9.jpg" alt="珍珠奶茶">
                    <div class="carousel-content">
                        <h2>經典珍珠奶茶</h2>
                        <p>香濃奶茶配上Q彈珍珠，經典不敗的好滋味</p>
                        <button class="cta-button">立即訂購</button>
                    </div>
                </div>

                <div class="carousel-slide">
                    <img src="./images/drink-8.jpg" alt="金桔檸檬">
                    <div class="carousel-content">
                        <h2>金桔檸檬</h2>
                        <p>新鮮金桔與檸檬完美結合，酸甜清爽，維他命C滿滿</p>
                        <button class="cta-button">立即訂購</button>
                    </div>
                </div>
            </div>
            <button class="carousel-btn prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="carousel-btn next">
                <i class="fas fa-chevron-right"></i>
            </button>
            <div class="carousel-dots">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
                <span class="dot" data-slide="2"></span>
            </div>
        </div>
    </section>

    <!-- 產品介紹區塊 -->
    <section id="products" class="products">
        <div class="container">
            <h2 class="section-title">熱門產品</h2>
            <p class="section-subtitle">精選最受歡迎的飲品，每一杯都是用心調製</p>

            <div class="products-grid">
                <div class="product-card">
                    <div class="product-image">
                        <img src="./images/drink-2.jpg" alt="珍珠奶茶">
                    </div>
                    <div class="product-info">
                        <h3>珍珠奶茶</h3>
                        <p>香濃奶茶配上Q彈珍珠，經典不敗的好滋味</p>
                        <div class="product-price">NT$ 55</div>
                        <a href="shopping_car.php"><button class="order-btn">我要購買</button></a>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="./images/drink-5.jpg" alt="茉莉綠茶">
                    </div>
                    <div class="product-info">
                        <h3>茉莉綠茶</h3>
                        <p>精選茉莉花與綠茶完美融合，清香淡雅，回甘持久</p>
                        <div class="product-price">NT$ 40</div>
                        <a href="shopping_car.php"><button class="order-btn">我要購買</button></a>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="./images/drink-7.jpg" alt="阿薩姆紅茶">
                    </div>
                    <div class="product-info">
                        <h3>阿薩姆紅茶</h3>
                        <p>印度阿薩姆茶葉，濃郁醇厚，香氣四溢</p>
                        <div class="product-price">NT$ 40</div>
                        <a href="shopping_car.php"><button class="order-btn">我要購買</button></a>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="./images/drink-4.jpg" alt="蜂蜜檸檬茶">
                    </div>
                    <div class="product-info">
                        <h3>蜂蜜檸檬茶</h3>
                        <p>新鮮檸檬片搭配天然蜂蜜，酸甜清爽好滋味</p>
                        <div class="product-price">NT$ 50</div>
                        <a href="shopping_car.php"><button class="order-btn">我要購買</button></a>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="./images/drink-1.jpg" alt="芒果冰沙">
                    </div>
                    <div class="product-info">
                        <h3>芒果冰沙</h3>
                        <p>新鮮芒果製成，綿密冰沙口感，夏日必備清涼飲品</p>
                        <div class="product-price">NT$ 70</div>
                        <a href="shopping_car.php"><button class="order-btn">我要購買</button></a>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="./images/drink-8.jpg" alt="金桔檸檬">
                    </div>
                    <div class="product-info">
                        <h3>金桔檸檬</h3>
                        <p>新鮮金桔與檸檬完美結合，酸甜清爽，維他命C滿滿</p>
                        <div class="product-price">NT$ 65</div>
                        <a href="shopping_car.php"><button class="order-btn">我要購買</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 特色介紹 -->
    <section class="features">
        <div class="container">
            <div class="features-grid">
                <div class="feature-item">
                    <i class="fas fa-leaf"></i>
                    <h3>天然原料</h3>
                    <p>嚴選天然原料，無人工添加物，健康美味</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-clock"></i>
                    <h3>快速製作</h3>
                    <p>專業調製，3分鐘內完成，新鮮現做</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-heart"></i>
                    <h3>用心服務</h3>
                    <p>親切服務，客製化調整，滿足您的需求</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 載入script.js -->
    <script src="script.js"></script>
    
    <?php include 'footer.php'; ?>
</body>

</html>