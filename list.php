<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: /ticket/login.php');
} elseif (!isset($_GET['dep'])) {
    header('Location: /ticket/index.php');
}
require 'vendor/autoload.php';
$tittle = "Lista Departamento";
$local = "Lista Departamento" . $_GET['dep'] ? $_GET['dep']  : "";


use App\Controller\ColaboradorController;
use App\Controller\DepartamentoController;
use App\Controller\TarefasController;

$adicionar_tarefa = ColaboradorController::adicionar_tarefa();

$listar_tarefa_por_departamento = TarefasController::listar_por_departamento(base64_decode($_GET['chave']));
$lista_de_funcionario = ColaboradorController::listar();
$lsita_departamento = DepartamentoController::listar();
require 'component/leftPanel.php';
require 'component/navBar.php';
?>


<div class="content mt-3">


    <div class="animated fadeIn">
        <div class="row h-25  ">
            <div class="col-lg ">
                <?php if(!is_null($adicionar_tarefa)): ?>
                <div class="alert  alert-danger alert-dismissible fade show  animate__animated animate__fadeInDown " role="alert">
                    <strong>Porblema</strong> <?php var_dump($adicionar_tarefa); ?>
                </div>
                <?php endif ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tarefas</strong>
                    </div>

                    <div class="card-body ">
                        <table id="table_id" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Estado</th>
                                    <th>Descrição</th>
                                    <th>Duração</th>
                                    <th>Concluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listar_tarefa_por_departamento as $key) : ?>
                                    <tr>
                                        <td><?php echo $key['nome_ordem']; ?></td>
                                        <td><?php echo $key['estado']; ?></td>
                                        <td><?php echo $key['descricao']; ?></td>
                                        <td><?php echo $key['duracao']; ?>h</td>
                                        <td>
                                            <form action="listar_usuarios.php" method="post"> <input type="hidden" value="<?php //echo $row['id_colaboradore']?>" name="id_colaborador"> <button name="apagar" type="submit" class="btn btn-danger">Concluir</button></form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header bg-primary">Passar Tarefas Para Funcionarios</div>
                        <div class="card-body card-block">
                            <form action="list.php?dep=<?php echo $_GET['dep'] ?>&chave=<?php echo $_GET['chave'] ?>" method="post" class="">
                                <div class="form-group">
                                    <div class="input-group">

                                        <select data-placeholder="Escolher Funcionarios" name="funcionarios[]" multiple class="standardSelect">
                                            <option value=""></option>
                                            <?php foreach ($lista_de_funcionario as $row_funcionario) : ?>
                                                <option value="<?php echo $row_funcionario['id_colaboradore']; ?>"><?php echo $row_funcionario['nome_colaborador']; ?></option>
                                            <?php endforeach ?>

                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">

                                        <select data-placeholder="Escolher a Tarefa" name="tarefas" class="standardSelect " tabindex="1">
                                            <?php foreach ($listar_tarefa_por_departamento as $key) : ?>
                                                <option value="<?php echo $key['id_ordem_departamento']; ?>"><?php echo $key['nome_ordem']; ?></option>
                                            <?php endforeach ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group ">

                                        <input type="number" id="email" name="tempo" placeholder="Tempo Exp: 8h" class=" form-control">
                                        <div class="input-group-addon">h</i></div>
                                    </div>
                                </div>

                                <div class="form-actions  form-group"><button type="submit" name="adicionar_tarefa" class="btn btn-success btn-sm">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-warning">Passar para Outro Departamento</div>
                        <div class="card-body card-block">
                            <form action="" method="post" class="">
                                <div class="form-group">
                                    <div class="input-group">

                                        <select data-placeholder="Escolher Departamento" class="standardSelect " tabindex="1">

                                            <?php foreach ($lsita_departamento as $row) : ?>
                                                <option value=""><?php echo $row['nome'] ?></option>
                                            <?php endforeach ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">

                                        <select data-placeholder="Escolher a Tarefa" class="standardSelect " tabindex="1">
                                            <?php foreach ($listar_tarefa_por_departamento as $key) : ?>
                                                <option value="<?php echo $key['id_ordem']; ?>"><?php echo $key['nome_ordem']; ?></option>
                                            <?php endforeach ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-actions  form-group"><button type="submit" class="btn btn-success btn-sm">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->


</div>


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
    $(document).ready(function() {
        $('#table_id').DataTable({
            "pageLength": 4,
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

<script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script>

</body>

</html>