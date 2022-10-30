<?php
session_start();

unset($_SESSION['error_name']);
unset($_SESSION['error_surname']);
unset($_SESSION['error_email']);
unset($_SESSION['error_pass']);
unset($_SESSION['error_conPass']);

function sendDate() {
    global $name , $surname , $email ,  $password , $confirmPass;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars(trim($_POST['name']));
        $surname = htmlspecialchars(trim($_POST['surname']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));
        $confirmPass = htmlspecialchars(trim($_POST['confirmPass']));
    }

    $_SESSION['name'] = $name;
    $_SESSION['surname'] = $surname;
    $_SESSION['email'] = $email;
    
    errorAlert();

    $password = md5($password);
    $confirmPass = md5($confirmPass);
}


function errorAlert()
{
    global $name, $surname, $email, $password, $confirmPass;

    if (mb_strlen($name) <= 1) {
        $_SESSION['error_name'] = "Введите корректное имя !";
        redirect();
    } else if (mb_strlen($surname) <= 1) {
        $_SESSION['error_surname'] = "Введите корректное фамилию !";
        redirect();
    } else if (mb_strlen($email) < 3 || strpos($email, "@") == false) {
        $_SESSION['error_email'] = "Вы ввели некорреткный email !";
        redirect();
    } else if (mb_strlen($password) < 8) {
        $_SESSION['error_pass'] = "Длина пароля должна быть больше 8 !";
        redirect();
    } else if ($confirmPass !== $password) {
        $_SESSION['error_conPass'] = "Пароли должны совпадать !";
        redirect();
    }
}

function redirect()
{
    header("Location: ../signUp.php");
    exit;
}

function getDateBase() {
    global $db , $name , $surname , $email , $password , $confirmPass;
    $sql = "INSERT INTO `registration` (`name` , `surname` , `email` , `password` , `confirmPassword`) VALUES ('$name' , '$surname' , '$email' , '$password' , '$confirmPass')";
    
    $query = $db->query($sql);
    $sign_up = $query->fetchAll(PDO::FETCH_ASSOC);

    return $sign_up;
}
sendDate();



try {
    $db = new PDO("mysql:host=localhost;dbname=dunyoblog", "root", "root");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

getDateBase();

$_SESSION['sign_up'] = [
    "id" => $db->lastInsertId(),
    "name" => $name,
];
header("Location: ./welcome/welcome.php");
$db = null;


