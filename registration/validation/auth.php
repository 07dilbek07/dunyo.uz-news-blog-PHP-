<?php
session_start();
require_once "../userDbPDO.php";

unset($_SESSION['err']);

$email = filter_var(trim($_POST['email']));
$password = filter_var(trim($_POST['password']));
$password = md5($password);


$userDbSignIn = new userDb();
$userDbSignIn->alertUser($email, $password);

header("Location: ./welcome/welcome.php");
$db = null;
