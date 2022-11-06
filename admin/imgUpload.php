<?
require_once "./warningEmptyElem.php";

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
        redirectAdmin();
    }
}
