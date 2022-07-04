<?php

    class Login extends Controller
    {

        public function __construct()
        {
            session_start();

            // cargar construct de la isntancia
            parent::__construct();
        }

        public function index()
        {
            // enviar a la vista para logearse
            $this->views->getView($this, "index");
        }

        public function registrarse()
        {
            // envia a la vista para que un cliente se registre
            $data['departamentos'] = $this->model->getDepartamentos();
            $data['tiposdoc'] = $this->model->getTiposDoc();
            $data['generos'] = $this->model->getGeneros();
            $this->views->getView($this, "registrarse", $data);
        }

        public function validar()
        {
            // validar cuando se logue el usuario
            if (empty($_POST['documento'] || empty($_POST['clave']))) {
                $msg = "Los campos estan vacios";
            } else {
                $documento = $_POST['documento'];
                $clave = $_POST['clave'];
                $hash = hash("SHA256", $clave);
                $estado = 1;
                $data = $this->model->getUsuario($documento, $hash, $estado);
                if (!empty($data)) {
                    $_SESSION['idusuario'] = $data['id'];
                    $_SESSION['documento'] = $data['documento'];
                    $_SESSION['nombre'] = $data['nombre'];
                    $_SESSION['apellido'] = $data['apellido'];
                    $_SESSION['activo'] = true;
                    $msg = "ok";
                } else {
                    $msg = "Usuario o contraseña incorrecta";
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE); // para mostrar caracteres especiales como tildes y ñ
            die();
        }

        public function vldocumento($documento) // validar que usuario no exista
        {
            $estado = 1;
            $data = $this->model->getDocUsuario($documento, $estado);
            if (!empty($data)) {
                $msg = "ok";
            } else {
                $msg = "Usuario ya existe";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE); // para mostrar caracteres especiales como tildes y ñ
            die();
        }

        public function municipios(int $id)
        {
            $data = $this->model->getMunicipiosDepa($id);
            $html = "<option value='' selected> Seleccione </option>";
            for ($i=0; $i < count($data); $i++) {
                $html.="<option value='".$data[$i]['idmunicipio']."'>".$data[$i]['nommunicipio']."</option>";
            }
            echo $html;
            die();
        }

        public function registrar()
        {
            date_default_timezone_set("America/Bogota");
            $fechareg = date('Y-m-d');

            $tipodoc = $_POST['tipodoc'];
            $documento = $_POST['documento'];
            $estado = 1;
            $data = $this->model->getDocUsuario($documento, $estado);
            if (!empty($data)) {
                $msg = "Usuario ya existe";
            } else {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $genero = $_POST['genero'];
                $fechanac = $_POST['fechanac'];
                $clave = $_POST['clave'];
                $departamento = $_POST['departamento'];
                $municipio = $_POST['municipio'];
                $direccion = $_POST['direccion'];
                $email = $_POST['email'];
                $telefono = $_POST['telefono'];
                $hash = hash("SHA256", $clave);

                if ($tipodoc == "" || empty($documento) || empty($nombre)  || empty($apellido)  || $genero == "" || empty($fechanac)  || empty($hash)) {
                    $msg = "Hay un campo vacio en la sesion Datos personal";
                } else {
                    if (empty($departamento) || empty($municipio) || empty($direccion) || empty($email) || empty($telefono)) {
                        $msg = "Hay un campo vacio en la sesion Datos contacto";
                    } else {
                        $data = $this->model->registrarUsuario($tipodoc, $documento, $nombre, $apellido, $genero, $fechanac, $hash,
                                                                $departamento, $municipio, $direccion, $email, $telefono, $fechareg);
                        if ($data == "ok") {
                            $msg = "si";
                        } else {
                            $msg = "Error al registrar el proveedor";
                        }
                    }
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE); // para mostrar caracteres especiales como tildes y ñ
            die();
        }
    }

?>