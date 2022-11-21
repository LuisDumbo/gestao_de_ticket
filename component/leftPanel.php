<?php

use App\Controller\DepartamentoController;

$lsita_departamento = DepartamentoController::listar();
?>
<!doctype html>
<html class="no-js" lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $tittle ? $tittle : ""; ?></title>


    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="assets/img/favicon/favicon.ico">


    <link rel="stylesheet" href="assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/vendors/chosen/chosen.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/alertSyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="assets/css/datataleStyle.css">
</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">L.D</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                    <h3 class="menu-title">Admin</h3>
                    

                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-plus-square-o"></i>Cadastar</a>

                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa  fa-user"></i><a href="cadastrar_usuario.php">Cadastrar Colaboradores</a></li>
                            <li><i class="fa fa-building-o"></i><a href="cadastrar_departamento.php">Cadastrar Departamento</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="listar_usuarios.php"> <i class="menu-icon fa  fa-list-alt"></i>Lisar Colaboradores </a>
                    </li>

                    <h3 class="menu-title"></h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-building-o"></i>Departamentos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php foreach ($lsita_departamento as $row) : ?>
                                  <li><i class="menu-icon fa fa-circle"></i><a href="list.php?dep=<?php echo $row['nome'] ?>"><?php echo $row['nome'] ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </li>

                    <li>
                        <a href="historico_tarefas.php"> <i class="menu-icon fa fa-file-text"></i>Historico</a>
                    </li>

                    <li>
                        <a href="lista_de_tarefas.php"> <i class="menu-icon fa fa-file-text"></i>Lista de Tarefas</a>
                    </li>

                </ul>
            </div>
        </nav>
    </aside>