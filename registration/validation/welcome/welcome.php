<?php
session_start();
$up = $_SESSION['sign_up']['name'] ?? "";
$in = $_SESSION['sign_in']['name'] ?? "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="/image/favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Dunyo.uz</title>
</head>

<body>
  <div style="text-align: center;">
    <br><br><br>
    <div class="alert alert-info" role="alert">
      <?php
      $referer = $_SERVER['HTTP_REFERER'];
      $linkSignUp = "http://projectdunyo/registration/signUp.php";
      $linkSignIn = "http://projectdunyo/registration/signIn.php";
    
      if($referer == $linkSignUp) {
        echo "<h2>Добро пожаловать $up вы успешно Регистрировались ! </h2>";
        unset($_SESSION['name']);  
        unset($_SESSION['surname']);
        unset($_SESSION['email']);
      } else if($referer == $linkSignIn) {
        echo "<h2>Добро пожаловать $in вы успешно Авторизовались !</h2>";
      }
      ?>
      <h3>Что бы выйти нажмите <a href="/index.php">здесь !</a></h3>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>