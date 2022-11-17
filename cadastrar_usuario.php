<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: /ticket/login.php');
}
require 'vendor/autoload.php';

use App\Controller\DepartamentoController;
use App\Controller\ColaboradorController;

$add_colaborador = ColaboradorController::cadastrar_colobarodar();
$list_dep =  DepartamentoController::listar();
$tittle = "Cadastrar Colaboradores";
$local = "Cadastrar Colaboradores";
require 'component/leftPanel.php';

require 'component/navBar.php';
?>


<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-lg-8 w-50">
            <?php if ($add_colaborador== "erro") : ?>
                <div class="alert  alert-danger alert-dismissible fade show mt-5 animate__animated animate__fadeInDown " role="alert">
                    <strong>Porblema</strong> ao Cadastrar.
                </div>

            <?php elseif ($add_colaborador== "success") : ?>
                <div class="alert  alert-success alert-dismissible fade show mt-5 animate__animated animate__fadeInDown " role="alert">
                    <strong>Departamento</strong> Cadastrado com Sucesso.
                </div>


            <?php endif ?>
            <div class="card ">
                <div class="card-header">Colaborador</div>
                <div class="card-body card-block">
                    <form action="" method="post" class="">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" id="username" name="nome" placeholder="Nome" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                                <input type="text" id="email" name="cargo" placeholder="Cargo" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                <select name="departamento" placeholder="Departamento" id="" class="form-control">
                                    <?php foreach ($list_dep as $row) : ?>
                                        <option value="<?php echo $row['id_departamento'] ?>"><?php echo $row['nome'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- <input type="email" id="email" name="cargo"  > -->
                            </div>
                        </div>

                        <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Cadastar</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="assets/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>


</body>

</html>