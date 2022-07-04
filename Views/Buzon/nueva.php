<?php include "Views/Templates/header.php"; ?>

    <div class="container-md mt-3t">
        <div class="card">
            <div class="card-header text-center bg-primary text-white mb-3">
                <h3 class="mt-2">Formulario</h3>
            </div>
            <div class="card-body">
                <form method="post" id="frmSolicitud">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="nompaciente">Paciente</label>
                                <input id="idpaciente" class="form-control" type="hidden" name="idpaciente" value="">
                                <fieldset disabled>
                                    <input id="paciente" class="form-control" type="text" name="paciente" value="<?php echo $data['usuario']['nombre'].' '.$data['usuario']['apellido']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="acudiente">Acudiente</label>
                                <fieldset disabled>
                                    <input id="acudiente" class="form-control" type="text" name="acudiente" value="<?php echo $data['usuario']['nombre'].' '.$data['usuario']['apellido']; ?>">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="tipopqrsf">Tipo</label>
                                <select id="tipopqrsf" class="form-select" name="tipopqrsf">
                                    <option value="" selected>Seleccione...</option>
                                    <?php foreach ($data['tipospqrsf'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['pqrsf']; ?></option>
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