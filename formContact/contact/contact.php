<?php
session_start();

$email = $_POST['email'];
$message = $_POST['message'];
$subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";

$headers = "From: $email\r\nReply-to: $email\r\nContent-type:text/html;charset=utf-8\r\n";

mail('dilbekdustmurodov2002@gmail.com', $subject, $message, $headers);

$_SESSION['email'] = $email;
$_SESSION['message'] = $message;


if($_SESSION['alert-success'] = true) {
    unset($_SESSION['email']);
    unset($_SESSION['message']);
};



header('Location: ../formContact.php');
?>

<h3><?= $email ?></h3>
<h3><?= $message ?></h3>