<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../mainStyle.css">
    <link rel="icon" type="image/x-icon" href="/image/favicon.ico">
    <title>Dunyo.uz</title>
</head>

<body>
    <div class="web_size">
        <section>
            <?php
            require_once "../inc/header.php";
            ?>
            <div class="login-box">
                <h2>Войти</h2>
                <form action="./validation/auth.php" method="post" enctype="multipart/form-data">
                    <div class="user-box">
                        <input type="email" name="email" required>
                        <label>Электронная почта или номер телефона</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password" required>
                        <label>Пароль</label>
                    </div>
                    
                    <div class="err"><?= $_SESSION['err'] ?? "";?></div>

                    <button class="ani" type="submit">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Отправить
                    </button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>