    <!-- 載入jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="index.php"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">首頁</a>
                    </li>

                    <?php
                     if(isset($_SESSION['mem'])):                   
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="main.php">會員中心</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="items.php">產品型錄</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shopping_car.php">購物車</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="query_order.php">訂單查詢</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./api/logout.php">登出</a>
                    </li>
                    <?php
                    else:
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="reg.php">註冊</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">登入</a>
                    </li>
                    <?php
                    endif;
                   ?>
                </ul>
            </div>
        </div>
    </nav>    