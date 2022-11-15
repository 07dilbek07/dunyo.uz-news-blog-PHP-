<?php
session_start();
require_once "../db_methods.php";
require_once "./warningEmptyElem.php";
require_once "./imgUpload.php";

unset($_SESSION['success']);


function sendNewsDataBase()
{
    global $imageUpload;

    $titles = htmlspecialchars(trim($_POST['titles']));
    $shortBody = htmlspecialchars(trim($_POST['shortBody']));
    $bodyDes = htmlspecialchars(trim($_POST['body']));
    $cat = htmlspecialchars(trim($_POST['cat']));


    $_SESSION['titles'] = $titles;
    $_SESSION['shortBody'] = $shortBody;
    $_SESSION['body'] = $bodyDes;


    errAlertAdminPan($titles, $shortBody, $bodyDes, $cat);
    imgUpload();

    $sendDBandPage = new NewsDbBasePDO();
    $sendDBandPage->setDataSendBase($titles, $shortBody, $imageUpload, $bodyDes, $cat);
    
    succes();
}
function succes()
{
    if ($_SESSION['success'] = true) {
        unset($_SESSION['titles']);
        unset($_SESSION['shortBody']);
        unset($_SESSION['body']);
        unset($_SESSION['cat']);
    }
    header("Location: ./admin.php");
}


sendNewsDataBase();
