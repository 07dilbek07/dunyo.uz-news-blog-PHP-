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
    <link rel="stylesheet" href="./contact.css">

    <title>Dunyo.uz</title>
</head>

<body>
    <div class="web_size">
        <?php
            require_once "../inc/header.php";
        ?>


        <div class="container-contact">
            <div class="pad-cont">
                <?php  
                    if(isset($_SESSION['alert-success']) ) {
                        echo "<div class='alert alert-success' role='alert'>Ваше сообщение успешно отправлено:)</div>";    
                    } 
                    unset($_SESSION['alert-success']);
                ?>
                <form class="form-cont" method="post" action="../formContact/contact/contact.php">
                    <input type="text" name="email" placeholder="Введите Email" value="<?= $_SESSION['email'] ?? ""?>" required >
                    <br><br>
                    <textarea id="message" name="message" placeholder="Введите ваше сообшение" style="height:200px" required ><?= $_SESSION['message'] ?? "";?></textarea>
                    <input type="submit" name="submit" value="Отправить">
                </form>

            </div>
        </div>
    </div>
</body>

</html>