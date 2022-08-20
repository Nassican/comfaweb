<?php include "Views/Templates/header.php"; ?>

    <div class="container-md mt-3t">
        <div class="card">
            <div class="card-header text-center bg-primary text-white mb-3">
                <h3 class="mt-2">Formulario</h3>
            </div>
            <div class="card-body">
                <form method="post" id="frmSolicitud">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="tipopqrsf">Tipo:</label>
                                <select id="tipopqrsf" class="form-select" name="tipopqrsf">
                                    <option value="" selected>Seleccione...</option>
                                    <?php foreach ($data['tipospqrsf'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['pqrsf']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="idarea">Dirigido al servicio de:</label>
                                <select id="idarea" class="form-select" name="idarea">
                                    <option value="" selected>Seleccione...</option>
                                    <?php foreach ($data['areas'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['area']." - ".$row['piso']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="idtipousu">Relacion con el paciente?</label>
                                <select id="idtipousu" class="form-select" name="idtipousu">
                                    <option value="" selected>Seleccione...</option>
                                    <?php foreach ($data['tiposusu'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['tipo']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label for="editor">Descripcion</label>
                                <textarea id="editor" class="form-control" name="editor"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 text-center">
                        <div class="col">
                            <button class="btn btn-primary px-5" type="button" onclick="crearSolicitud(event);">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include "Views/Templates/footer.php"; ?>