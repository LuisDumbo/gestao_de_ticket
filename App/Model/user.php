<?php
namespace App\Model;

use App\Db\conection;
use PDOException;
use PDO;

class user
{

    public static  function  registar_user($nome, $email, $password)
    {
        try {
            $conn = conection::connect();
            $users = $conn->prepare("INSERT INTO user(nome,email,password) VALUES ('$nome','$email','$password');");
            return $users->execute();
            //return  $retun;
        } catch (PDOException $exception) {
            return $exception;
        }
    }

    public static function login($email, $password)
    {

        try {
            $conn = conection::connect();
            $users = $conn->query("SELECT * FROM `user` WHERE email = '$email' AND password ='$password'");
            $retun =  $users->fetchAll(PDO::FETCH_ASSOC);



            return  $retun;
        } catch (PDOException $exception) {
            return $exception;
        }
    }
}
