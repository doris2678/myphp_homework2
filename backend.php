<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <title>後台管理系統</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        /* background-color: #f4f6f8; */
        padding-top: 60px;
        /* header 高度 */
        padding-left: 200px;
        /* sidebar 寬度 */
        padding-bottom: 40px;
        /* footer 高度 */
    }

    .header {
        width: 100%;
        height: 60px;
        background-color: #2c3e50;
        color: white;
        padding: 15px 30px;
        box-sizing: border-box;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .header h1 {
        font-size: 20px;
        margin: 0;
    }

    #sidebar {
        width: 200px;
        background: #34495e;
        color: white;
        padding: 20px;
        position: fixed;
        top: 60px;
        bottom: 40px;
        left: 0;
        overflow-y: auto;
    }

    #sidebar h2 {
        font-size: 18px;
        margin-bottom: 20px;
    }

    #sidebar a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 10px;
        margin-bottom: 8px;
        border-radius: 4px;
        transition: background-color 0.2s;
    }

    #sidebar a:hover {
        background-color: #1abc9c;
    }

    #content {
        margin-left: 200px;
        margin-top: 60px;
        margin-bottom: 40px;
        width: calc(100% - 200px);
        height: calc(100vh - 100px);
        border: none;
    }

    .footer {
        width: 100%;
        height: 40px;
        background-color: #ecf0f1;
        color: #7f8c8d;
        text-align: center;
        line-height: 40px;
        position: fixed;
        bottom: 0;
        left: 0;
        font-size: 14px;
    }
    </style>
</head>

<body>

    <div class="header">
        <h1>後台管理系統</h1>
        <!-- <div>            
            <span>歡迎，管理員</span>
        </div> -->
    </div>

    <div id="sidebar">
        <h2>管理選單</h2>
        <a href="./backend/admin.php" target="contentFrame">帳號管理</a>
        <a href="./backend/member.php" target="contentFrame">會員管理</a>
        <a href="./backend/items.php" target="contentFrame">商品管理</a>
    </div>

    <iframe id="content" name="contentFrame"></iframe>

    <div class="footer">
        <div style="color:white">Copyright © 2025 Tieat. All Rights Reserved 泰好喝有限公司 </div>
    </div>

</body>

</html>