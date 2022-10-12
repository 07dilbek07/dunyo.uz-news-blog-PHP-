<?php
session_start();

unset($_SESSION['err_titles']);
unset($_SESSION['err_shortBody']);
unset($_SESSION['err_file']);
unset($_SESSION['err_bodyDes']);
unset($_SESSION['err_categ']);
unset($_SESSION['success']);


function PanelHeaderError()
{
    header("Location: ./admin.php");
    exit;
}


$titles = htmlspecialchars(trim($_POST['titles']));
$shortBody = htmlspecialchars(trim($_POST['shortBody']));
$bodyDes = htmlspecialchars(trim($_POST['body']));
$categ = htmlspecialchars(trim($_POST['categ']));


$_SESSION['titles'] = $titles;
$_SESSION['shortBody'] = $shortBody;
$_SESSION['body'] = $bodyDes;


if ($titles == "") {
    $_SESSION['err_titles'] = "Требуется заголовок";
    PanelHeaderError();
} elseif ($shortBody == "") {
    $_SESSION['err_shortBody'] = "Требуется краткое описание";
    PanelHeaderError();
} elseif ($bodyDes < 1) {
    $_SESSION['err_bodyDes'] = "Oписание обязателен";
    PanelHeaderError();
} elseif ($categ == "") {
    $_SESSION['err_categ'] = "Категория требуется";
    PanelHeaderError();
}


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


try {
    $db = new PDO("mysql:host=localhost;dbname=daryoblog", "root", "root");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$admin = "INSERT INTO `news-blog` (title , shortDescription , image , description , category) VALUES ('$titles' , '$shortBody' , '$imageUpload'  , '$bodyDes' , '$categ')"; 
$querys = $db->query($admin);
$admins = $querys->setFetchMode(PDO::FETCH_ASSOC);


if ($_SESSION['success'] = true) {
    unset($_SESSION['titles']);
    unset($_SESSION['shortBody']);
    unset($_SESSION['body']);
    unset($_SESSION['categ']);
}
header("Location: ./admin.php");
