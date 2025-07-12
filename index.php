<?php
 session_start();
 include_once "./api/db.php";
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>泰好喝</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php include 'header.php';?>

    <main>
        <!-- carousel  -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/carousel01.jpg" alt="" class="d-block" style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="./images/carousel02.jpg" alt="" class="d-block" style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="./images/carousel03.jpg" alt="" class="d-block" style="width:100%">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        <!-- carousel  end-->

        <!-- container1  -->
        <div id="box1"></div>
        <div class="container mt-3">
            <div class="row">
                <div class="col text-center">
                    <div class="box1">
                        <img class="img-fluid" src="./images_s20250702/img.jpg" alt="">                       
                    </div>
                </div>
            </div>
        </div>
        <!-- container1 end -->
        <!-- container2  -->
        <div id="box2"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-4 mt-3">
                    <!-- bs Card -->
                    <div class="card" style="width:100%">
                        <img class="card-img-top" src="./images/img01.jpg" alt="" style="width:100%">
                        <div class="card-body">
                            <h5 class="card-title text-center">Redmi Pad 2 4G</h5>
                            <a href="https://www.mi.com/tw/product/redmi-pad-2-4g/" class="btn btn-light w-100"
                                target="_blank"><i class="fa-regular fa-heart"></i>&nbsp;&nbsp;暸解更多</a>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-sm-4 mt-3">
                    <!-- bs Card -->
                    <div class="card" style="width:100%">
                        <img class="card-img-top" src="./images/img02.jpg" alt="" style="width:100%">
                        <div class="card-body">
                            <h5 class="card-title text-center">Redmi Pad SE 8.7</h5>
                            <a href="https://www.mi.com/tw/product/redmi-pad-se-8-7-inch/" class="btn btn-light w-100"
                                target="_blank"><i class="fa-regular fa-heart"></i>&nbsp;&nbsp;暸解更多</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-4 mt-3">
                    <!-- bs Card -->
                    <div class="card" style="width:100%">
                        <img class="card-img-top" src="./images/img03.jpg" alt="" style="width:100%">
                        <div class="card-body">
                            <h5 class="card-title text-center">Redmi Pad Pro</h5>
                            <a href="https://www.mi.com/tw/product/redmi-pad-pro/" class="btn btn-light w-100"
                                target="_blank"><i class="fa-regular fa-heart"></i>&nbsp;&nbsp;暸解更多</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container2 end -->

    </main>

    <!-- 載入bs5 js (bundle) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.bundle.min.js"
        integrity="sha512-Tc0i+vRogmX4NN7tuLbQfBxa8JkfUSAxSFVzmU31nVdHyiHElPPy2cWfFacmCJKw0VqovrzKhdd2TSTMdAxp2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- 載入jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?php include 'footer.php';?>

</body>

</html>