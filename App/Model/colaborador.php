<?php

namespace App\Model;


use App\Db\conection;
use PDOException;
use PDO;

class colaborador
{

    public static  function  registar_colaborador($nome, $cargo, $id_departamento)
    {
        try {
            $conn = conection::connect();


            $colaborador = $conn->prepare("INSERT INTO colaboradores(nome_colaborador,cargo, id_departamento) VALUES ('$nome','$cargo','$id_departamento');");
            return $colaborador->execute();
            //return  $retun;
        } catch (PDOException $exception) {
            return $exception;
        }
    }

    public static function listar_colaborador()
    {

        try {

            $conn = conection::connect();
            $colaborador = $conn->query("SELECT * FROM `colaboradores` JOIN departamento on (colaboradores.id_departamento = departamento.id_departamento)");
            $retun =  $colaborador->fetchAll(PDO::FETCH_ASSOC);



            return  $retun;
        } catch (PDOException $exception) {
            return $exception;
        }
    }

    public static function apagar_colaborador($id_colaborador)
    {
        try {
            $conn = conection::connect();


            $colaborador = $conn->prepare("DELETE FROM colaboradores WHERE id_colaboradore =  $id_colaborador");
            return $colaborador->execute();
            //return  $retun;
        } catch (PDOException $exception) {
            return $exception;
        }
    }

    public static function atualizar_colaborador($nume_colaborador, $cargo , $id_departamento, $id_colaborador)
    {
        try {
            $conn = conection::connect();


            $colaborador = $conn->prepare("UPDATE colaboradores set nome_colaborador= '$nume_colaborador', cargo = '$cargo' , id_departamento = $id_departamento   WHERE id_colaboradore= $id_colaborador ");
            return $colaborador->execute();
            //return  $retun;
        } catch (PDOException $exception) {
            return $exception;
        }
    }
}
