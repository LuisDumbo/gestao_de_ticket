<?php 
session_start();
if(!isset($_SESSION['nome'])){
    header('Location: /ticket/login.php');
}
require 'vendor/autoload.php';
$tittle="Listar Tarefas";
$local="Listar Tarefas";
use App\Controller\TarefasController;
$lista_de_tarefas = TarefasController::listar();
require 'component/leftPanel.php';
require 'component/navBar.php';
?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row  ">
                    <div class="col-lg ">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Listar Tarefas</strong>
                            </div>
                            <div class="card-body ">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered " >
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Descrição</th>
                                            <th>Data Inicio</th>
                                            <th>Data Fim</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($lista_de_tarefas as $key): ?> 
                                        <tr>
                                            <td><?php echo $key['nome_ordem'] ?></td>
                                            <td><?php echo $key['descricao'] ?></td>
                                            <td><?php echo $key['data_inicio'] ?></td>
                                            <td><?php echo $key['data_fim'] ?></td>
                                            <td><?php echo $key['estado'] ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    


                </div>
                
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>
