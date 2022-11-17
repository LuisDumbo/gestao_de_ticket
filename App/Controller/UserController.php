<?php

namespace App\Controller;

use App\Model\user;

class  UserController
{

    public static function adicionar_usuario()
    {

        if ($_POST) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            user::registar_user($nome, $email, $password);
        }
    }

    public static function login()
    {
        $erro = 0;
        if ($_POST) {
            $password = $_POST['password'];
            $email = $_POST['email'];
            $user = user::login($email, $password);

            if (count($user) == 1) {
                session_start();
                $_SESSION['nome'] = $user[0]['nome'];
                $_SESSION['user'] = $user[0]['id_user'];
                header('Location: /ticket/index.php');
                exit;
            } else {
                $erro = 1;

                return $erro;
            }
        }
    }

    public
    static function Sair()
    {

        session_start();
        session_destroy();
        header('Location: /ticket/login.php');
    }
}
