<?php include "Views/Templates/header.php"; ?>

    <div class="container-md mt-4">
        <div class="card">
            <div class="card-header text-center mb-3">
                <h3 class="mt-2">Solicitud <b>No.</b> <?php echo $data['no']; ?></h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <h4>Datos usuario</h4>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <span><b>Nombre completo:</b></span> <p><?php echo $data['solicitud']['nombre']." ".$data['solicitud']['apellido']; ?></p>
                        </div>
                    </div>
                    <div class="col">
                        <span><b>Cedula:</b></span> <p><?php echo $data['solicitud']['documento']; ?></p>
                    </div>
                    <div class="col">
                        <span><b>Relacion con el paciente:</b></span> <p><?php echo $data['solicitud']['tipousu']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span><b>Direccion:</b></span> <p><?php echo $data['solicitud']['direccion']; ?></p>
                    </div>
                    <div class="col">
                        <span><b>Telefono:</b></span> <p><?php echo $data['solicitud']['telefono']; ?></p>
                    </div>
                    <div class="col">
                        <span><b>Email:</b></span> <p><?php echo $data['solicitud']['email']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><b><?php echo $data['solicitud']['pqrsf']; ?></b> dirigida al servicio de: <?php echo $data['solicitud']['area']." piso ".$data['solicitud']['piso']; ?></p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col text-center">
                        <h4>Descripcion</h4>
                    </div>
                    <?php echo $data['solicitud']['descripcion']; ?>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-end">
                    <?php echo $data['solicitud']['fechareg']; ?>
                </div>
            </div>
        </div>
        <form method="post" id="frmSolicitudRes" class="mb-5">
            <input type="text" class="d-none" id="idSolicitud" value="<?php echo $data['no']; ?>" name="idSolicitud">
            <div class="row mt-5" id="pregunta">
                <h4 class="text-center">Descripcion de la solicitud</h4>
                <div class="col-12 col-lg-12">
                    <div class="form-group">
                        <textarea id="editorPreg" class="form-control" name="editorPreg"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-5 d-none" id="investigacion">
                <h4 class="text-center">Descripcion de la investigacion</h4>
                <div class="col-12 col-lg-12">
                    <div class="form-group">
                        <textarea id="editorInv" class="form-control" name="editorInv"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-5 d-none" id="conclusion">
                <h4 class="text-center">Conclusion</h4>
                <div class="col-12 col-lg-12">
                    <div class="form-group">
                        <textarea id="editorConc" class="form-control" name="editorConc"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-5 text-center">
                <div class="col d-none" id="atrasFrm">
                    <button class="btn btn-outline-danger px-5" type="button" onclick="atrasFrm(event);"><i class="fas fa-arrow-left"></i> Atras</button>
                </div>
                <div class="col" id="continuarFrm">
                    <button class="btn btn-primary px-5" type="button" onclick="continuarFrm(event);">Continuar <i class="fas fa-arrow-right"></i></button>
                </div>
                <div class="col d-none" id="enviarFrm">
                    <button class="btn btn-success px-5" type="button" onclick="enviarFrm(event);">Enviar</button>
                </div>
            </div>
        </form>
    </div>

<?php include "Views/Templates/footer.php"; ?>