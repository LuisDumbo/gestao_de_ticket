<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: /ticket/login.php');
}
require 'vendor/autoload.php';

use App\Controller\UserController;
use App\Controller\DepartamentoController;
use App\Controller\ColaboradorController;
use App\Controller\TarefasController;

$add_tarefas = TarefasController::add();
$num_tarefas = TarefasController::listar();
$num_dep = DepartamentoController::listar();
$num_colaborador = ColaboradorController::listar();

$tittle = "Dashboard";
$local = "Dashboard";
require 'component/leftPanel.php';

require 'component/navBar.php';
?>

<?php if ($add_tarefas == "erro") : ?>
    <div class="alert  alert-danger alert-dismissible fade show  animate__animated animate__fadeInDown " role="alert">
        <strong>Porblema</strong> ao Cadastrar.
    </div>
<?php elseif ($add_tarefas == "erro1") : ?>
    <div class="alert  alert-danger alert-dismissible fade show  animate__animated animate__fadeInDown " role="alert">
        <strong>Data Inicio</strong> deve ser maior que <strong>Data Fim</strong>
    </div>

<?php elseif ($add_tarefas == "success") : ?>
    <div class="alert  alert-success alert-dismissible fade show  animate__animated animate__fadeInDown " role="alert">
        <strong>Tarefa</strong> Criada com Sucesso.
    </div>


<?php endif ?>

<div class="row justify-content-md-center mt-5 col-lg">
    
    <a href="listar_usuarios.php" class="col-sm-6 col-lg-3">

        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent  theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                    </button>

                </div>
                <h4 class="mb-0">
                    <span class="count"><?php echo  count($num_colaborador); ?></span>
                </h4>
                <p class="text-light">Colaboradores </p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart1"></canvas>
                </div>

            </div>

        </div>

    </a>
    <!--/.col-->

    <a href="cadastrar_departamento.php" class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent  theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                        <i class="fa fa-building-o"></i>
                    </button>

                </div>
                <h4 class="mb-0">
                    <span class="count"><?php echo  count($num_dep); ?></span>
                </h4>
                <p class="text-light">Departamentos</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                </div>

            </div>
        </div>
    </a>
    <!--/.col-->

    <a href="historico_tarefas.php" class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent theme-toggle text-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
                        <i class="fa fa-briefcase"></i>
                    </button>

                </div>
                <h4 class="mb-0">
                <span class="count"><?php echo  count($num_tarefas); ?></span>
                </h4>
                <p class="text-light">Tarefas</p>

            </div>

            <div class="chart-wrapper px-0" style="height:70px;" height="70">
                <canvas id="widgetChart3"></canvas>
            </div>
        </div>
    </a>

</div>

<?php require 'component/modal.php'; ?>

<script src="assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="assets/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>



<script src="assets/vendors/chosen/chosen.jquery.min.js"></script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Não Existe!",
            width: "100%"
        });
    });
</script>

<script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script>


</body>

</html>