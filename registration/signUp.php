<?php
    session_start();
    
?>

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

            <div class="login-box reg-box" >
                <h2>Регистратция</h2>
                <form action="./validation/check.php" method="post" enctype="multipart/form-data">
                    <div class="user-box">
                        <input type="text" name="name" value="<?=$_SESSION['name'] ?? "";?>">
                        <label>Имя</label>
                        <div class="errorr"><?=$_SESSION['error_name'] ?? "" ;?></div><br>
                    </div>
                    <div class="user-box"> 
                        <input type="text" name="surname" value="<?=$_SESSION['surname'] ?? "";?>">
                        <label>Фамилия</label>
                        <div class="errorr"><?=$_SESSION['error_surname'] ?? "" ;?></div><br>
                    </div>
                    <div class="user-box">
                        <input type="email" name="email" value="<?=$_SESSION['email'] ?? "";?>">
                        <label>Электронная почта или номер телефона</label>
                        <div class="errorr"><?=$_SESSION['error_email'] ?? "";?></div><br>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password" >
                        <label>Пароль</label>
                        <div class="errorr"><?=$_SESSION['error_pass'] ?? "";?></div><br>
                        
                    </div>
                    <div class="user-box">
                        <input type="password" name="confirmPass" >
                        <label>Подвердить Пароль</label>
                        <div class="errorr"><?= $_SESSION['error_conPass'] ?? "";?></div><br>
                
                    </div>


                    <button class="ani but" type="submit">
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