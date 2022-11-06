<?php
session_start();
require_once "../db_methods.php";

unset($_SESSION['err_titles']);
unset($_SESSION['err_shortBody']);
unset($_SESSION['err_file']);
unset($_SESSION['err_bodyDes']);
unset($_SESSION['err_cat']);
unset($_SESSION['success']);


function sendNewsDataBase()
{
    global $imageUpload;

    $titles = htmlspecialchars(trim($_POST['titles']));
    $shortBody = htmlspecialchars(trim($_POST['shortBody']));
    $bodyDes = htmlspecialchars(trim($_POST['body']));
    $cat = htmlspecialchars(trim($_POST['cat']));


    dataFrozen($titles, $shortBody, $bodyDes);
    errAlert($titles, $shortBody, $bodyDes, $cat);
    imgUpload();

    $sendDBandPage = new NewsDbBasePDO();
    $sendDBandPage->setDataSendBase($titles, $shortBody, $imageUpload, $bodyDes, $cat);
}

function errAlert($titles, $shortBody, $bodyDes, $cat)
{
    if ($titles == "") {
        $_SESSION['err_titles'] = "Требуется заголовок";
        PanelHeaderError();
    } elseif ($shortBody == "") {
        $_SESSION['err_shortBody'] = "Требуется краткое описание";
        PanelHeaderError();
    } elseif ($bodyDes < 1) {
        $_SESSION['err_bodyDes'] = "Oписание обязателен";
        PanelHeaderError();
    } elseif ($cat == "") {
        $_SESSION['err_cat'] = "Категория требуется";
        PanelHeaderError();
    }
};

function imgUpload()
{
    global $imageUpload;

    $imageUpload = $_FILES['imgfile']['name'];
    $tempname = $_FILES['imgfile']["tmp_name"];
    $folder = __DIR__ . "/img/" . $imageUpload;
    $types = ['image/jpeg', 'image/gif', 'image/png'];


    if (in_array($_FILES['imgfile']['type'], $types)) {
        if (move_uploaded_file($tempname, $folder)) {
            // 
        }
    } else {
        $_SESSION['err_file'] = "Извините, ваш файл не был загружен. Мы разрешаем только типы файлов JPG, GIF и PNG.";
        PanelHeaderError();
    }
};

function PanelHeaderError()
{
    header("Location: ./admin.php");
    exit;
};
function dataFrozen($titles, $shortBody, $bodyDes)
{
    $_SESSION['titles'] = $titles;
    $_SESSION['shortBody'] = $shortBody;
    $_SESSION['body'] = $bodyDes;
}


sendNewsDataBase();

if ($_SESSION['success'] = true) {
    unset($_SESSION['titles']);
    unset($_SESSION['shortBody']);
    unset($_SESSION['body']);
    unset($_SESSION['cat']);
}
header("Location: ./admin.php");
