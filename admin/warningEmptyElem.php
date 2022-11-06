<?
unset($_SESSION['err_titles']);
unset($_SESSION['err_shortBody']);
unset($_SESSION['err_file']);
unset($_SESSION['err_bodyDes']);
unset($_SESSION['err_cat']);

function errAlertAdminPan($titles, $shortBody, $bodyDes, $cat)
{
    if ($titles == "") {
        $_SESSION['err_titles'] = "Требуется заголовок";
        redirectAdmin();
    } elseif ($shortBody == "") {
        $_SESSION['err_shortBody'] = "Требуется краткое описание";
        redirectAdmin();
    } elseif ($bodyDes < 1) {
        $_SESSION['err_bodyDes'] = "Oписание обязателен";
        redirectAdmin();
    } elseif ($cat == "") {
        $_SESSION['err_cat'] = "Категория требуется";
        redirectAdmin();
    }
}

function redirectAdmin()
{
    header("Location: ./admin.php");
    exit;
}

