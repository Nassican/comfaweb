<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
        <script src="<?php echo base_url; ?>Assets/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="col-auto text-center">
            <div class="row">
                <h1>Bienvenido</h1>
                <p>al buzon de sugerencias</p>
            </div>
            <div class="row">
                <div class="col">
                <a class="btn btn-primary px-4" href="<?php echo base_url; ?>Login">Iniciar sesion</a>
                </div>
                <div class="col">
                    <a class="btn btn-primary px-4" href="<?php echo base_url; ?>Login/registrarse">Registrarse</a>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url; ?>Assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <script>
            const base_url = "<?php echo base_url; ?>";
        </script>
        <script src="<?php echo base_url; ?>Assets/js/login.js"></script>
    </body>
</html>