<?
unset($_SESSION['error_name']);
unset($_SESSION['error_surname']);
unset($_SESSION['error_email']);
unset($_SESSION['error_pass']);
unset($_SESSION['error_conPass']);


function warningEmptyElemUser($name, $surname, $email, $password, $confirmPass)
{
    if (mb_strlen($name) <= 1) {
        $_SESSION['error_name'] = "Введите корректное имя !";
        redirectSignUp();
    } else if (mb_strlen($surname) <= 1) {
        $_SESSION['error_surname'] = "Введите корректное фамилию !";
        redirectSignUp();
    } else if (mb_strlen($email) < 3 || strpos($email, "@") == false) {
        $_SESSION['error_email'] = "Вы ввели некорреткный email !";
        redirectSignUp();
    } else if (mb_strlen($password) < 8) {
        $_SESSION['error_pass'] = "Длина пароля должна быть больше 8 !";
        redirectSignUp();
    } else if ($confirmPass !== $password) {
        $_SESSION['error_conPass'] = "Пароли должны совпадать !";
        redirectSignUp();
    }
}

function redirectSignUp()
{
    header("Location: ../signUp.php");
    exit;
}
