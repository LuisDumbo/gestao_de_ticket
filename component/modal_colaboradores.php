<?php

use App\Controller\DepartamentoController;



$list_dep =  DepartamentoController::listar();

?>
<div class="modal fade " id="exampleModal-<?php echo $row['id_colaboradore'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg  " role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Colaborador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card-body card-block">
                    <form action="listar_usuarios.php" method="post" class="">
                        <input type="hidden" name="id_colaborador" value="<?php echo $row['id_colaboradore'] ?>">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" id="username" value="<?php echo $row['nome_colaborador'] ?>" name="nome" placeholder="Nome" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                                <input type="text" id="cargo" value="<?php echo $row['cargo'] ?>" name="cargo" placeholder="Cargo" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                <select name="departamento" placeholder="Departamento" id="" class="form-control">
                                    <option value="<?php echo $row['id_departamento'] ?>"><?php echo $row['nome'] ?></option>
                                    <?php foreach ($list_dep as $rows) : ?>
                                        <?php if ($rows['nome'] != $row['nome']) : ?>
                                            <option value="<?php echo $rows['id_departamento'] ?>"><?php echo $rows['nome'] ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                                <!-- <input type="email" id="email" name="cargo"  > -->
                            </div>
                        </div>



                </div>
                <div class="modal-footer">
                   
                    <button type="submit" name="atualizar" class="btn btn-primary">atualizar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>