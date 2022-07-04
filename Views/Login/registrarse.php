<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrarse</title>
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
        <script src="<?php echo base_url; ?>Assets/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Registrarse</h3></div>
                                    <div class="card-body">
                                        <form action="" id="frmRegistrarse">
                                            <!-- container datos personales -->
                                            <div class="container" id="dtpersonales">
                                                <div class="row justify-content-center mt-3 mb-2">
                                                    <div class="col-auto">
                                                        <h4 class="">Datos personales</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" aria-label="Default select example" name="tipodoc" id="tipodoc">
                                                                <option value="" selected>Seleccione...</option>
                                                                <?php foreach ($data['tiposdoc'] as $row) { ?>
                                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nomdoc']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <label for="tipodoc">Tipo Documento</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control border" id="documento" name="documento" type="text" placeholder="Documento" />
                                                            <label for="documento">Documento</label>
                                                            <p class="text-danger d-none" id="alertdocumento1">Solo se admiten numeros</p>
                                                            <p class="text-danger d-none" id="alertdocumento2">Usuario ya existe</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control border" id="nombre" name="nombre" type="text" placeholder="Nombre" />
                                                            <label for="nombre">Nombres</label>
                                                            <p class="text-danger d-none" id="alertnombre">Solo se admiten letras</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control border" id="apellido" name="apellido" type="text" placeholder="Apellido" />
                                                            <label for="apellido">Apellidos</label>
                                                            <p class="text-danger d-none" id="alertapellido">Solo se admiten letras</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" aria-label="Default select example" name="genero" id="genero">
                                                                <option value="" selected>Seleccione...</option>
                                                                <?php foreach ($data['generos'] as $row) { ?>
                                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['genero']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <label for="genero">Genero</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control border" id="fechanac" name="fechanac" type="date" onblur="vlfecha()" placeholder="Fecha nacimiento" />
                                                            <label for="fechanac">Fecha Nacimiento</label>
                                                            <p class="text-danger d-none" id="alertfechanac">Solo mayores de 18 años</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="clave" name="clave" type="password" placeholder="Clave" />
                                                            <label for="clave">Clave</label>
                                                            <p class="text-danger d-none" id="alertclave">De 4 a 12 digitos</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control border" id="clave2" name="clave2" type="password" placeholder="Confirmar clave" />
                                                            <label for="clave2">Confirmar clave</label>
                                                            <p class="text-danger d-none" id="alertclave2">Claves deben ser iguales</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="alert alert-danger tex-center d-none" id="alertpersonal" role="alert">
                                                    <!-- Alerta Datos personales -->
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                    <button class="btn btn-primary" type="button" onclick="frmContinuar(event);">Continuar</button>
                                                </div>
                                            </div>
                                            <!-- fin container datos personales -->

                                            <!-- container datos de contacto -->
                                            <div class="container d-none" id="dtcontacto">
                                                <div class="row justify-content-center mt-3 mb-2">
                                                    <div class="col-auto">
                                                        <h4 class="">Datos Contacto</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" aria-label="Default select example" name="departamento" id="departamento">
                                                                <option value="" selected>Seleccione...</option>
                                                                <?php foreach ($data['departamentos'] as $row) { ?>
                                                                    <option value="<?php echo $row['iddepto']; ?>"><?php echo $row['nomdepto']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <label for="departamento">Departamento</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" aria-label="Default select example" name="municipio" id="municipio">
                                                                <option value="" selected>Seleccione...</option>
                                                            </select>
                                                            <label for="municipio">Municipio</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="direccion" name="direccion" type="text" placeholder="Direccion" />
                                                            <label for="direccion">Direccion</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control border" id="email" name="email" type="text" placeholder="Email" />
                                                            <label for="email">Email</label>
                                                            <p class="text-danger d-none" id="alertemail">Digete un correo valido</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control border" id="telefono" name="telefono" type="text" placeholder="Telefono" />
                                                            <label for="telefono">Telefono</label>
                                                            <p class="text-danger d-none" id="alerttelefono">Digete un telefono valido</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="alert alert-danger tex-center d-none" id="alertcontacto" role="alert">
                                                    <!-- Alerta Datos Contacto -->
                                                </div>
                                                <div class="row ">
                                                    <div class="col">
                                                        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                            <button class="btn btn-light text-primary" type="button" onclick="frmAtras(event);">Atras</button>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                            <button class="btn btn-primary" type="button" onclick="frmRegistrarse(event);">Registrarse</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- fin container datos de contacto -->
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <span>Ya tienes cuenta?&nbsp;</span><a href="<?php echo base_url; ?>Login">Iniciar sesión</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;  @yorth21 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?php echo base_url; ?>Assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <script>
            const base_url = "<?php echo base_url; ?>";
        </script>
        <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/login.js"></script>
    </body>
</html>
