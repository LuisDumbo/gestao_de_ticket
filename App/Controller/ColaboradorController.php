<?php

namespace App\Controller;

use App\Model\colaborador;

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
}
