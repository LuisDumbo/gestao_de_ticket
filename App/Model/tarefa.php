<?php

namespace App\Model;

use App\Db\conection;
use PDOException;
use PDO;


class tarefa
{


    public static function adicionar($nome, $descricao, $data_inicio, $data_fim, $id_ordemartamento, $duracao, $estado)
    {
        try {
            $conn = conection::connect();

            $user = $_SESSION['user'];

            $tarefa = $conn->prepare("INSERT INTO ordem(nome_ordem,data_inicio,data_fim, descricao, id_user, estado)VALUES('$nome','$data_inicio','$data_fim','$descricao',$user,' $estado');");
            //code...
            $tarefa->execute();
        } catch (PDOException $exception) {
            return $exception;
        }
    }

    public static function listar_tarefas(){

      
        try {
            $user = $_SESSION['user'];
            $conn = conection::connect();
            $ordem = $conn->query("SELECT * FROM `ordem` WHERE id_user =  $user ");
            $retun =  $ordem->fetchAll(PDO::FETCH_ASSOC);



            return  $retun;
        } catch (PDOException $exception) {
            return $exception;
        }

    }
}
