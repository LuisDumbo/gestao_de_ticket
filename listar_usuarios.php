<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: /ticket/login.php');
}
require 'vendor/autoload.php';

use App\Controller\ColaboradorController;


$atualizar_colaborador =  ColaboradorController::atualizar();
$apagar_colaborador = ColaboradorController::apagar();

$lis_colaborador =  ColaboradorController::listar();

$tittle = "Listar Usuarios";
$local = "Listar Usuarios";
require 'component/leftPanel.php';
require 'component/navBar.php';
?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row  ">
            <div class="col-lg ">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"> Colaboradores</strong>
                    </div>
                    <div class="card-body ">
                        <table id="table_id" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Cargo</th>
                                    <th>Departametno</th>
                                    <th>Apagar</th>
                                    <th>Editar</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($lis_colaborador) < 1) : ?>
                                    <tr>
                                        <td>0 Colaboradores</td>
                                    </tr>
                                <?php else : ?>
                                    <?php foreach ($lis_colaborador as $row) : ?>
                                        <tr>
                                            <td><?php echo $row['nome_colaborador'] ?></td>
                                            <td><?php echo $row['cargo'] ?></td>
                                            <td><?php echo $row['nome'] ?></td>
                                            <td>
                                                <form action="listar_usuarios.php" method="post"> <input type="hidden" value="<?php echo $row['id_colaboradore'] ?>" name="id_colaborador"> <button name="apagar" type="submit" class="btn btn-danger">Apagar</button></form>
                                            </td>
                                            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal-<?php echo $row['id_colaboradore'] ?>">Editar</button></td>
                                        </tr>

                                    <?php endforeach ?>

                                <?php endif ?>

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>




        </div>

    </div><!-- .animated -->
    <!-- Modal -->
    <?php foreach ($lis_colaborador as $row) : ?>
        <?php require 'component/modal_colaboradores.php'; ?>
    <?php endforeach ?>
    <!-- .content -->


</div><!-- /#right-panel -->


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
    $(document).ready(function() {
        $('#table_id').DataTable({
            "pageLength": 10,
            "lengthMenu": false,
            "bLengthChange": false, //thought this line could hide the LengthMenu
            "bInfo": false,
            "language": {
                //"lengthMenu": "Ver _MENU_ resultados",
                "zeroRecords": "0 Resultados encontrados",
                "info": "Ver página _PAGE_ de _PAGES_",
                "infoEmpty": "Sem resultados",
                "search": "Procurar:",
                "paginate": {
                    "first": "Primeiro",
                    "last": "Último",
                    "next": "Próximo",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>

</body>

</html>