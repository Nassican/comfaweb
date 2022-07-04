<?php

    class Buzon extends Controller
    {

        public function __construct()
        {
            session_start();

            // cargar construct de la isntancia
            parent::__construct();
        }

        public function nueva()
        {
            // enviar a la vista para logearse
            $data['tipospqrsf'] = $this->model->getTipospqrsf();
            $data['usuario'] = Array ("nombre" => $_SESSION['nombre'], "apellido" => $_SESSION['apellido']);
            $this->views->getView($this, "nueva", $data);
        }

        public function crearSolicitud()
        {
            date_default_timezone_set("America/Bogota");
            $fechareg = date('Y-m-d');

            $idpaciente = $_POST['idpaciente'];
            $idacudiente = $_SESSION['idusuario'];
            $idtipo = $_POST['tipopqrsf'];
            $descripcion = $_POST['editor'];

            // Poner el mismo valor de idusuairo al idpaciente
            if (empty($idacudiente)) {
                $msg = "Usuario no existe, Vuelve a iniciar sesion";
            } else {
                if (empty($idpaciente)) {
                    $idpaciente = $idacudiente;
                }
                if (empty($idtipo) || empty($descripcion)) {
                    $msg = "Todos los campos son obligatorios";
                } else {
                    $data = $this->model->crearSolicitud($idpaciente, $idacudiente, $idtipo, $descripcion, $fechareg);
                    if ($data == "ok") {
                        $msg = "si";
                    } else {
                        $msg = "error";
                    }
                }
            }

            echo json_encode($msg, JSON_UNESCAPED_UNICODE); // para mostrar caracteres especiales como tildes y ñ
            die();

        }

    }

?>