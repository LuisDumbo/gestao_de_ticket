<?php

namespace App\Controller;

use App\Model\departamento;

class DepartamentoController
{

     public static function cadastrar_departamento()
     {
          if ($_POST) {

               if ($_POST['nome'] == "") {
                    return "erro";
               } else {
                    $nome =  $_POST['nome'];
                    departamento::registar_departamento($nome);  
                    return "success";
               }
          }
        
     }

     public static function listar(){
          return departamento::listar_departamento();
     }
}
