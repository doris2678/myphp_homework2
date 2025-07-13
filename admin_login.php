<?php
 session_start();
 ?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理員登入 - 泰好喝手搖飲料專賣店</title>
    <?php include "title_link.php" ?>

    <style>
    .admin-login-section {
        margin-top: 120px;
        padding: 40px 20px;
        min-height: calc(100vh - 120px);
        background: linear-gradient(135deg, #1a237e 0%, #3949ab 100%);
    }

    .admin-login-container {
        max-width: 500px;
        margin: 0 auto;
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .admin-login-title {
        text-align: center;
        color: #1a237e;
        margin-bottom: 30px;
        font-size: 2rem;
        font-weight: 700;
    }

    .admin-icon {
        text-align: center;
        margin-bottom: 20px;
    }

    .admin-icon i {
        font-size: 3rem;
        color: #1a237e;
    }

    .error-message {
        background: #ffebee;
        color: #c62828;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        text-align: center;
        border-left: 4px solid #c62828;
    }

    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
    }

    .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 12px 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #1a237e;
        box-shadow: 0 0 0 0.2rem rgba(26, 35, 126, 0.25);
    }

    .btn-primary {
        background: linear-gradient(135deg, #1a237e, #3949ab);
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(26, 35, 126, 0.3);
    }

    .btn-warning {
        background: linear-gradient(135deg, #ff9800, #f57c00);
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 152, 0, 0.3);
    }
    </style>

</head>

<body>
    <?php include 'header.php'; ?>

    <section class="admin-login-section">
        <div class="admin-login-container">
            <div class="admin-icon">
                <i class="fas fa-user-shield"></i>
            </div>
            <h2 class="admin-login-title">管理員登入</h2>
            <?php
              if(isset($_GET['err'])){
                echo '<div class="error-message">帳號或密碼錯誤，請重新輸入</div>';
              }
            ?>

            <form action="./api/adminlogin_process.php" method="post">
                <div class="mb-4">
                    <label for="acc" class="form-label">管理員帳號</label>
                    <input type="text" class="form-control" id="acc" name="acc" required autocomplete="username">
                </div>

                <div class="mb-4">
                    <label for="pw" class="form-label">管理員密碼</label>
                    <input type="password" class="form-control" id="pw" name="pw" required
                        autocomplete="current-password">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">登入</button>
                    <button type="reset" class="btn btn-warning">重新輸入</button>
                </div>
            </form>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>

</html>