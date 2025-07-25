<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入 - 泰好喝手搖飲料專賣店</title>
    <?php include "title_link.php" ?>
    <style>
    body {
        background: linear-gradient(135deg, #fff8e1 0%, #f3e5f5 100%);
        min-height: 100vh;
        font-family: 'Noto Sans TC', sans-serif;
    }

    .login-section {
        margin-top: 120px;
        padding: 40px 20px;
        min-height: calc(100vh - 120px);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-container {
        max-width: 420px;
        width: 100%;
        background: #fff;
        padding: 2.5rem 2rem 2rem 2rem;
        border-radius: 18px;
        box-shadow: 0 10px 32px rgba(44, 85, 48, 0.10);
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .login-title {
        text-align: center;
        color: #2c5530;
        font-weight: 700;
        margin-bottom: 2rem;
        letter-spacing: 2px;
    }

    .form-label {
        font-weight: 600;
        color: #2c5530;
        margin-bottom: 0;
        white-space: nowrap;
    }

    .form-control {
        border-radius: 8px;
        border: 2px solid #e0e0e0;
        padding: 12px 15px;
        font-size: 1.1rem;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #2c5530;
        box-shadow: 0 0 0 0.15rem rgba(44, 85, 48, 0.15);
    }

    .input-group-text {
        background: #f3e5f5;
        border-radius: 8px 0 0 8px;
        color: #2c5530;
        border: 2px solid #e0e0e0;
        border-right: 0;
    }

    .input-group {
        align-items: center;
    }

    .btn-success,
    .btn-outline-secondary {
        border-radius: 8px;
        font-size: 1.1rem;
        padding: 12px 0;
        width: 100%;
        max-width: 200px;
        margin: 0 auto;
    }

    .btn-success {
        background: linear-gradient(135deg, #2c5530, #4a7c59);
        border: none;
        font-weight: 600;
        transition: all 0.2s;
    }

    .btn-success:hover {
        background: #2c5530;
        box-shadow: 0 5px 15px rgba(44, 85, 48, 0.15);
    }

    .btn-outline-secondary {
        border: 1.5px solid #bdbdbd;
        font-weight: 600;
    }

    .login-footer-link {
        color: #4a7c59;
        text-decoration: underline;
        font-weight: 500;
    }

    .login-footer-link:hover {
        color: #2c5530;
    }

    .login-btn-group {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 1.5rem;
    }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <section class="login-section">
        <div class="login-container">
            <h2 class="login-title">會員登入</h2>
            <?php if(isset($_GET['err'])): ?>
            <div class="alert alert-danger text-center" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>帳號或密碼錯誤，請重新輸入
            </div>
            <?php endif; ?>
            <form action="./api/login_process.php" method="post" autocomplete="on" class="w-100">
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <label for="acc"
                            class="form-label input-group-text bg-white border-end-0"><span>帳號：</span></label>
                        <input type="text" class="form-control" id="acc" name="acc" required autofocus
                            autocomplete="username">
                    </div>
                </div>
                <br>
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <label for="pw"
                            class="form-label input-group-text bg-white border-end-0"><span>密碼：</span></label>
                        <input type="password" class="form-control" id="pw" name="pw" required
                            autocomplete="current-password">
                    </div>
                </div>
                <div class="login-btn-group">
                    <button type="submit" class="btn btn-success">登入</button>
                    <button type="reset" class="btn btn-outline-secondary">重新輸入</button>
                </div>
            </form>
            <div class="mt-4 text-center">
                <span>還沒有帳號？</span> <a href="reg.php" class="login-footer-link">立即註冊</a>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

</body>

</html>