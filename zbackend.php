<?php
 session_start();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後台管理系統</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="./css/style.css">
    <style>
    html,
    body {
        height: 100%;
        margin: 0;
    }

    .row-full-height {
        min-height: 100vh;
    }

    #content {
        height: 100vh;
        overflow-y: auto;
        padding: 20px;
    }
    </style>
</head>

<body>
    <!-- 載入jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- 載入bs5 js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.min.js"
        integrity="sha512-zKeerWHHuP3ar7kX2WKBSENzb+GJytFSBL6HrR2nPSR1kOX1qjm+oHooQtbDpDBSITgyl7QXZApvDfDWvKjkUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="container-fluid">
        <div class="row row-full-height">
            <!-- 左側選單 -->
            <div class="col-md-2 bg-light border-end" id="menu">
                <ul class="nav flex-column p-3">
                    <li class="nav-item">
                        <a href="./backend/admin.php" class="nav-link" data-page="./backend/zadmin.php">後台管理者帳號</a>
                    </li>
                    <li class="nav-item">
                        <a href="./backend/aa.php" class="nav-link" data-page="./backend/aa.php">頁面 2</a>
                    </li>
                </ul>
            </div>


            <!-- 右側內容 -->
            <div class="col-md-8" id="content">
                請選擇左側選單項目。
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        const myLink = $('.nav-link');
        const myContent = $('#content');

        myLink.click(function(e) {
            e.preventDefault();
            const page = $(this).data('page');
            myContent.load(page);

        });
    });
    </script>

</body>

</html>