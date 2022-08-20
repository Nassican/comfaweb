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
        <div class="card mt-4">
            <div class="card-header text-center mb-3">
                <h3 class="mt-2">Respuesta del admin</h3>
            </div>
            <div class="card-body">
                <div class="col text-center">
                    <h4>Descripcion de la solicitud</h4>
                </div>
                <?php echo $data['respuesta']['problema']; ?>
                <div class="col text-center mt-3">
                    <h4>Descripcion de la investigacion</h4>
                </div>
                <?php echo $data['respuesta']['investigacion']; ?>
                <div class="col text-center mt-3">
                    <h4>Conclusiones</h4>
                </div>
                <?php echo $data['respuesta']['conclusion']; ?>
                <div class="col text-center mt-3">
                    <h4>Pruebas</h4>
                </div>
                <div class="text-center">
                    <?php foreach ($data['pruebas'] as $row) { ?>
                        <a href="<?php echo base_url; ?>Pruebas/<?php echo $row['nombre']; ?>"><i class="fas fa-file-pdf"></i> <?php echo $row['nombre']; ?></a><br>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

<?php include "Views/Templates/footer.php"; ?>