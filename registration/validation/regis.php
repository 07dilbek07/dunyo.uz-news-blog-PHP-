<?php
session_start();
require_once "./errEmptyElemUser.php";
require_once ("../userDbPDO.php");

function sendData() {

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

    
    warningEmptyElemUser($name, $surname, $email, $password, $confirmPass);

    $password = md5($password);
    $confirmPass = md5($confirmPass);

    $userDbSignUp = new userDb();
    $userDbSignUp->getDataBaseRegis($name , $surname , $email , $password , $confirmPass);
    $userDbSignUp->welcomeUserRegis($name);

}

sendData();
header("Location: ./welcome/welcome.php");



