<?php

namespace App\Controller;

use DateTime;
use App\Model\tarefa;

class TarefasController
{

    public static function add()
    {

        if (isset($_POST['adicionar_tarefas'])) {
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $data_inicio = new DateTime($_POST['data_inicio']);
            $data_fim = new DateTime($_POST['data_fim']);
            $id_departamento = $_POST['id_departamento'];
            $duracao = $_POST['duracao'];
            $estado = 'Em Andamento';


            /*
            if ($data_inicio > $data_fim) {
                return "errado";
            }else{
                return "certo";
            } */

            if (is_null($nome) | is_null($descricao) | is_null($data_inicio) | is_null($data_fim)  | is_null($id_departamento) | is_null($duracao)) {

                return "erro";
            } elseif ($data_inicio > $data_fim) {
                return "erro1";
            } else {

                $inicio =  $data_inicio->format('Y-m-d H:i:s');
                $fim = $data_fim->format('Y-m-d H:i:s');
                tarefa::adicionar($nome, $descricao, $inicio, $fim, $id_departamento, $duracao, $estado);
                return "success";
            }


            //  return [$nome,$descricao, $data_inicio,$data_fim,$id_departamento,$duracao,$estado  ];

        }
    }

    public static function listar()
    {
        return tarefa::listar_tarefas();
    }

    public static function listar_por_departamento($id_departamento)
    {

        return tarefa::listar_tarefas_por_departamento($id_departamento);
    }
}
