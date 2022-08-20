<?php

    class Buzon extends Controller
    {

        public function __construct()
        {
            session_start();

            // cargar construct de la isntancia
            parent::__construct();
        }

        public function session()
        {
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
        }

        // VISTAS

        public function nueva()
        {
            $this->session();
            // enviar a la vista para logearse
            $data['tipospqrsf'] = $this->model->getTipospqrsf();
            $data['tiposdoc'] = $this->model->getTiposDoc();
            $data['tiposusu'] = $this->model->getTiposUsu();
            $data['areas'] = $this->model->getAreas();
            //$data['usuario'] = Array ("nombre" => $_SESSION['nombre'], "apellido" => $_SESSION['apellido']);
            $this->views->getView($this, "nueva", $data);
        }

        public function seguimiento()
        {
            $this->session();
            $this->views->getView($this, "seguimiento");
        }

        public function verSolicitud($idSolicitud)
        {
            $this->session();
            $data['no'] = $idSolicitud;
            $data['solicitud'] = $this->model->getSolicitud($idSolicitud);

            $data['respuesta'] = $this->model->getRespuesta($idSolicitud);
            $data['pruebas'] = $this->model->getPruebas($idSolicitud);

            // validar si la solicitud ya fue respondida por un admin
            $vSoli = $this->model->vSolicitud($idSolicitud);
            if ($vSoli['estado'] == 2) {
                $vista = "solicitudres";
            } else {
                $vista = "solicitud";
            }

            $this->views->getView($this, $vista, $data);
        }

        // FIN VISTAS

        public function crearSolicitud()
        {
            $this->session();
            date_default_timezone_set("America/Bogota");
            $fechareg = date('Y-m-d');

            // validar los compos no esten vaicos
            if (empty($_SESSION['idusuario'])) {
                $msg = "Error inesperado, vuelve a iniciar sesion por favor";
            } else {
                // datos solicitud
                $idusuario = $_SESSION['idusuario'];
                $idtipo = $_POST['tipopqrsf'];
                $idarea = $_POST['idarea'];
                $idtipousu = $_POST['idtipousu'];
                $descripcion = $_POST['editor'];
                if (empty($idtipo) || empty($descripcion) || $descripcion == "<div><br></div>" || empty($idtipousu) || empty($idarea)) {
                    $msg = "Todos los campos son obligatorios";
                } else {
                    $data = $this->model->crearSolicitud($idusuario, $idtipo, $idtipousu, $idarea, $descripcion, $fechareg);
                    if ($data == "ok") {
                        $msg = "si";
                    } else {
                        $msg = "Error al crear la solicitud";
                    }
                }
            }

            echo json_encode($msg, JSON_UNESCAPED_UNICODE); // para mostrar caracteres especiales como tildes y ñ
            die();
        }

        public function listar()
        {
            $this->session();
            $idusuario = $_SESSION['idusuario'];
            $data = $this->model->getSolicitudes($idusuario);
            for ($i=0; $i < count($data); $i++) {
                if ($data[$i]['estado'] == 1) {
                    $color = 'secondary';
                    $msj = 'Enviado';
                } else {
                    $color = 'primary';
                    $msj = 'Respondido';
                }

                $data[$i]['estado'] = '<span class="badge bg-'.$color.'">'.$msj.'</span>';

                $data[$i]['acciones'] = '<div>
                                            <a class="btn btn-primary" href="'.base_url.'Buzon/verSolicitud/'.$data[$i]['id'].'" title="Ver solicitud"><i class="fas fa-eye"></i></a>
                                        </div>';
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

    }

?>