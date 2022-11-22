<?php
session_start();

class userDb
{
    private $db;

    function __construct()
    {
        try{
            $this->db = new PDO("mysql:host=localhost; dbname=dunyoblog", "root", "root");
        } catch(PDOException $e) {
            echo "<br><br><br><br><br>";
            echo "<h1>Error connection database!</h1>";
        }
    }

    // SignUp
    function getDataBaseRegis($name, $surname, $email, $password, $confirmPass)
    {
        $sql = "INSERT INTO `registration` (`name` , `surname` , `email` , `password` , `confirmPassword`) VALUES ('$name' , '$surname' , '$email' , '$password' , '$confirmPass')";

        $query = $this->db->query($sql);
        $sign_up = $query->fetchAll(PDO::FETCH_ASSOC);

        return $sign_up;
    }

    function welcomeUserRegis($name)
    {
        $_SESSION['sign_up'] = [
            "id" => $this->db->lastInsertId(),
            "name" => $name,
        ];
    }



    // SignIn

    function getAuthDataBase($email, $password)
    {
        $sql = "SELECT * FROM `registration` WHERE `email`='$email' AND `password`='$password' ";
        $query = $this->db->query($sql);
        $sign_in = $query->fetchAll(PDO::FETCH_ASSOC);

        return $sign_in;
    }


    function alertUser($email, $password)
    {
        $succes = $this->getAuthDataBase($email, $password);

        if (count($succes) == '0') {
            $_SESSION['err'] = "Такой пользователь не найдено !";
            header("Location: ../signIn.php");
            exit;
        }

        $succes = $succes[0];
        $_SESSION['sign_in'] = [
            "id" => $this->db->lastInsertId(),
            "name" => $succes["name"],
        ];
    }
}
