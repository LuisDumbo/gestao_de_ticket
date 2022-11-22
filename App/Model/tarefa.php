<?php

namespace App\Model;

use App\Db\conection;
use PDOException;
use PDO;


class tarefa
{


    public static function adicionar($nome, $descricao, $data_inicio, $data_fim, $id_departamento, $duracao, $estado)
    {
        try {
            $conn = conection::connect();

            $user = $_SESSION['user'];

            $tarefa = $conn->prepare("INSERT INTO ordem(nome_ordem,data_inicio,data_fim, descricao, id_user, estado)VALUES('$nome','$data_inicio','$data_fim','$descricao',$user,' $estado');");
            $tarefa->execute();

            $id = tarefa::pegar_id();
            $id_ordem = $id[0]['id_ordem'];


            tarefa::adicionar_tarefa_ao_departamento($id_ordem, $id_departamento, $estado, $data_inicio, $data_fim, $duracao);
        } catch (PDOException $exception) {
            return $exception;
        }
    }

    public static function adicionar_tarefa_ao_departamento($id_ordem, $id_departamento, $estado, $data_inicio, $data_fim, $duracao)
    {


        try {
            $conn = conection::connect();

            $user = $_SESSION['user'];

            $tarefa = $conn->prepare("INSERT INTO `ordem_por_departamento` ( `id_ordem`, `id_departamento`, `estado`, `data_inicio`, `data_fim`, `duracao`, `id_user`) 
            VALUES ('$id_ordem', '$id_departamento', '$estado', '$data_inicio', '$data_fim', '$duracao', '$user')");
            $tarefa->execute();
        } catch (PDOException $exception) {
            return $exception;
        }
    }

    public static function listar_tarefas()
    {


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

    public static function pegar_id()
    {

        try {
            $conn = conection::connect();

            $user = $_SESSION['user'];
            $tarefa = $conn->query("SELECT id_ordem FROM `ordem` WHERE id_user = $user ORDER BY  id_ordem DESC LIMIT 1");
            $retornar =  $tarefa->fetchAll(PDO::FETCH_ASSOC);
            return  $retornar;
        } catch (PDOException $exception) {
            return $exception;
        }
    }

    public static function listar_tarefas_por_departamento($id_departamento, )
    {

        try {

            $user = $_SESSION['user'];
            $conn = conection::connect();
            $ordem = $conn->query("SELECT * FROM `ordem_por_departamento` LEFT join departamento on (departamento.id_departamento = ordem_por_departamento.id_departamento) LEFT JOIN ordem on (ordem.id_ordem = ordem_por_departamento.id_ordem) WHERE ordem_por_departamento.id_departamento = $id_departamento and ordem_por_departamento.estado = 'Em Andamento' and ordem_por_departamento.id_user = $user;");
            $retun =  $ordem->fetchAll(PDO::FETCH_ASSOC);



            return  $retun;
        } catch (PDOException $exception) {
            return $exception;
        }
    }
}
