<?php
 session_start();
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者登入</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css"> 
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <div class="container mt-3">
            <h2 class="text-center">管理者登入</h2>
            <?php
              if(isset($_GET['err'])){
                echo "帳號或密碼錯誤，請重新輸入";
              }
            ?> 
                 
            <form action="./api/adminlogin_process.php" method="post">
                <div class="mb-3 mt-3">
                    <label for="acc">管理者帳號:</label>
                    <input type="text" class="form-control" id="acc" name="acc" required autocomplete="username">
                </div>

                <div class="mb-3 mt-3">
                    <label for="pw">管理者密碼:</label>
                    <input type="password" class="form-control" id="pw" name="pw" required autocomplete="current-password">
                </div>

                <div class="mb-3 mt-3">
                    <div class="row">
                        <button type="submit" class="btn btn-primary mb-3">登入</botton>
                        <button type="reset" class="btn btn-warning">重新輸入</botton>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>