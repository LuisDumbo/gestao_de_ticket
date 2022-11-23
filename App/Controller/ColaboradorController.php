<?php

namespace App\Controller;

use App\Model\colaborador;
use App\Model\tarefa;

class ColaboradorController
{

    public static function cadastrar_colobarodar()
    {


        if ($_POST) {
            if ($_POST['nome'] == "" || $_POST['cargo'] == "" || $_POST['departamento'] == "") {
                return "erro";
            } else {
                $nome =  $_POST['nome'];
                $cargo =  $_POST['cargo'];
                $id_departamento =   $_POST['departamento'];
                colaborador::registar_colaborador($nome, $cargo, $id_departamento);
                return "success";
            }
        }
    }

    public static function listar()
    {
        return colaborador::listar_colaborador();
    }

    public static function apagar()
    {

        if (isset($_POST['apagar'])) {

            colaborador::apagar_colaborador($_POST['id_colaborador']);
        }
    }

    public static  function atualizar()
    {
        if (isset($_POST['atualizar'])) {
            return colaborador::atualizar_colaborador($_POST['nome'], $_POST['cargo'], $_POST['departamento'], $_POST['id_colaborador']);

            // return $_POST['departamento'] ;// "cargo   " + $_POST['cargo']  + "id departamneto " + $_POST['departamento'] +"id colaborador " + $_POST['id_colaboradore']  ;
        }
    }

    public static function adicionar_tarefa()
    {
        if (isset($_POST['adicionar_tarefa'])) {


            if (!isset($_POST['funcionarios']) || !isset($_POST['tarefas']) || !isset($_POST['tempo'])) {
                return "Os dados devem ser todos preenchidos";
            } else {
                $funcionarios = $_POST['funcionarios'];
                $tarefas = $_POST['tarefas'];
                $tempo  = $_POST['tempo'];
                $erros_funcionarios = null;
                $funcionario_bd = "";



                $duracao_tarefa  = tarefa::duracao_tarefa($tarefas);
                $nova_duracao_tarefa = $duracao_tarefa[0]['duracao'] - $tempo;

                if ($nova_duracao_tarefa < 0) {
                    $erros_funcionarios = "A tarefa escolhida esta com otempo esgotado";
                } else {
                    foreach ($funcionarios as $key_funcionarios) {

                        $funcionario_bd =   colaborador::horas_gastas($key_funcionarios);

                        $nova_quantidade_de_horas_restantes  =   $funcionario_bd[0]['horas_a_gastar']  - $tempo;
                        if ($nova_quantidade_de_horas_restantes < 0) {
                            $erros_funcionarios .= ", para o funcionario " . $funcionario_bd[0]['nome_colaborador'] . " tem unicamente " . $funcionario_bd[0]['horas_a_gastar'] . "h desponiveis ";
                        } else {
                            colaborador::atualizar_horas_gastas($nova_quantidade_de_horas_restantes, $key_funcionarios);
                        }
                    }
                    tarefa::atualizar_tempo_tarefa($tarefas, $nova_duracao_tarefa);
                }


                return $erros_funcionarios;
            }
        }
    }
}
