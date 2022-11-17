<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Adicionar Tarefas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body card-block">
                    <form action="/ticket/index.php" method="post" class="">
                        <div class="form-group">
                            <div class="input-group">

                                <input type="text" id="username" name="nome" placeholder="Nome" class="form-control" required="requiored">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">

                                <input type="text" id="username" name="descricao" placeholder="descricao" class="form-control" required="requiored">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">

                                <input type="number" id="username" name="duracao" placeholder="duração" class="form-control" required="requiored">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="col-6 w-25 p-3">  

                                    <div class="input-group-addon">Data Inicio</i></div>
                                    <input type="datetime-local" id="username" name="data_inicio" class="form-control" required="requiored">
                                </div>

                                <div class="col-6 w-25 p-3">
                                    <div class="input-group-addon">Data Fim</div>
                                    <input type="datetime-local" id="username" name="data_fim" class="form-control" required="requiored">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <select name="id_departamento" data-placeholder="Departamento" class="standardSelect " tabindex="1">
                                <option value="" disabled selected>Departamento</option>
                                    <?php foreach ($lsita_departamento as $row) : ?>
                                        <option value="<?php echo $row['id_departamento'] ?>"><?php echo $row['id_departamento'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>           
                        </div>



                        <!-- <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Cadastar</button></div> -->

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="adicionar_tarefas" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>