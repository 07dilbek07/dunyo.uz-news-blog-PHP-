<?php
session_start();
unset($_SESSION['err']);

$email = filter_var(trim($_POST['email']));
$password = filter_var(trim($_POST['password']));
$password = md5($password);


try {
    $db = new PDO("mysql:host=localhost;dbname=dunyoblog", "root", "root");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function getAuthDateBase()
{
    global $db, $email, $password;
    $sql = "SELECT * FROM `registration` WHERE `email`='$email' AND `password`='$password' ";
    $query = $db->query($sql);
    $sign_in = $query->fetchAll(PDO::FETCH_ASSOC);

    return $sign_in;
}
$dateUser = getAuthDateBase();

if (count($dateUser) == '0') {

    $_SESSION['err'] = "Такой пользователь не найдено !";
    header("Location: ../signIn.php");
    exit;
}

$dateUser = $dateUser[0];
$_SESSION['sign_in'] = [
    "id" => $db->lastInsertId(),
    "name" => $dateUser["name"],
];
header("Location: ./welcome/welcome.php");
$db = null;
