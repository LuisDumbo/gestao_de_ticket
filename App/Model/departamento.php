<?php
namespace App\Model;


use App\Db\conection;
use PDOException;
use PDO;

class departamento
{

    public static  function  registar_departamento($nome)
    {
        try {
            $conn = conection::connect();
           
            $user = $_SESSION['user'];
            $dep = $conn->prepare("INSERT INTO departamento(nome,id_user) VALUES('$nome','$user');");
            return $dep->execute();
            //return  $retun;
        } catch (PDOException $exception) {
            return $exception;
        }
    }

    public static function listar_departamento()
    {

        try {
            $user = $_SESSION['user'];
            $conn = conection::connect();
            $dep = $conn->query("SELECT * FROM `departamento` WHERE id_user =  $user ");
            $retun =  $dep->fetchAll(PDO::FETCH_ASSOC);



            return  $retun;
        } catch (PDOException $exception) {
            return $exception;
        }
    }
}
