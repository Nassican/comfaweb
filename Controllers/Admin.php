<?php

    class Admin extends Controller
    {

        public function __construct()
        {
            session_start();
            parent::__construct();
        }

        public function session()
        {
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
        }

        public function index()
        {
            $this->session();
            $this->views->getView($this, "index");
        }

        public function buzon()
        {
            $this->session();
            $idadmin = $_SESSION['idusuario'];
            $verificar = $this->model->verificarPermiso($idadmin, 'admin');
            if (!empty($verificar)) {
                $this->views->getView($this, "buzon");
            } else {
                header('Location: '.base_url);
            }
        }

        public function usuarios()
        {
            $this->session();
            $this->views->getView($this, "usuarios");
        }

        public function sinResponder()
        {
            $this->session();
            $estado = 1;
            $data = $this->model->getSolicitudes($estado);
            for ($i=0; $i < count($data); $i++) {

                $b = 0;
                $verificar = $this->model->vRespuesta($data[$i]['id']);
                if (empty($verificar)) {
                    $btnResColor = "secondary";
                    $accionRes = "responder/".$data[$i]['id'];
                } else {
                    $btnResColor = "success";
                    $accionRes = "verRespuesta/".$data[$i]['id'];
                    $b = $b + 1;
                }

                $verificar = $this->model->vPruebas($data[$i]['id']);
                if ($verificar['contador'] == 0) {
                    $btnPruColor = "secondary";
                    $contenido = '';
                } else {
                    $btnPruColor = "success";
                    $contenido = '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    '.$verificar['contador'].'
                                    <span class="visually-hidden">unread messages</span>
                                </span>';
                    $b = $b + 1;
                }

                if ($data[$i]['estado'] == 1) {
                    $data[$i]['estado'] = '<span class="badge bg-secondary mx-2">Pendiente</span>';
                }
                if ($b == 2) {
                    $data[$i]['estado'] = '<span class="badge bg-success mx-2">Terminado</span>';
                }
                if ($b == 1) {
                    $data[$i]['estado'] = '<span class="badge bg-warning mx-2">En proceso</span>';
                }

                // Verificar si ya respondieron y cargaron pruebas a una solicitud
                if ($b == 2) {
                    $btnSendRes = '<button class="btn btn-primary" onclick="enviarRes('.$data[$i]['id'].');" title="Enviar respuesta"><i class="fas fa-share"></i></button>';
                } else {
                    $btnSendRes = '';
                }

                $data[$i]['acciones'] = '<div>
                                            <a class="btn btn-'.$btnResColor.'" href="'.base_url.'Admin/'.$accionRes.'" title="Responder solicitud"><i class="fas fa-file-alt"></i></a>
                                            <button class="btn btn-'.$btnPruColor.' position-relative" onclick="aggArchivos('.$data[$i]['id'].');" title="Subir archivos"><i class="fas fa-file-upload"></i>
                                                '.$contenido.'
                                            </button>
                                            '.$btnSendRes.'
                                        </div>';
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function responder(int $idSolicitud)
        {
            $this->session();
            $data['no'] = $idSolicitud;
            $data['solicitud'] = $this->model->getSolicitud($idSolicitud);
            $this->views->getView($this, "responder", $data);
        }

        public function enviarRespuesta()
        {
            $this->session();
            date_default_timezone_set("America/Bogota");
            $fechareg = date('Y-m-d');

            $idadmin = $_SESSION['idusuario'];
            $idsolicitud = $_POST['idSolicitud'];
            $pregunta = $_POST['editorPreg'];
            $investigacion = $_POST['editorInv'];
            $conclusion = $_POST['editorConc'];

            $verificar = $this->model->verificarPermiso($idadmin, 'admin');
            if (!empty($verificar)) {
                if (empty($idsolicitud) || $pregunta == "<div><br></div>" || $investigacion == "<div><br></div>" || $conclusion == "<div><br></div>") {
                    $msg = "Todos los campos son obligatorios";
                } else {
                    // Validar si respuesta ya existe
                    $data = $this->model->vRespuesta($idsolicitud);
                    if (empty($data)) {
                        $data = $this->model->enviarRespuesta($idadmin, $idsolicitud, $pregunta, $investigacion, $conclusion, $fechareg);
                        if ($data == "ok") {
                            $msg = "si";
                        } else {
                            $msg = "Error al crear la solicitud";
                        }
                    } else {
                        $msg = "Esta solicitud ya ha sido respondida";
                    }
                }
            } else {
                $msg = "Error, no tienes permisos de administrador";
            }

            echo $msg;
            die();
        }

        public function gdrArchivos(int $idsolicitud)
        {
            $this->session();
            date_default_timezone_set("America/Bogota");

            // subir archivos
            foreach ($_FILES['archivos']['tmp_name'] as $key => $tmp_name) {
                if ($_FILES['archivos']['name'][$key]) {
                    if ($_FILES['archivos']['type'][$key] == 'application/pdf') {
                        $filename = date('Ymd_his', time());
                        $random = mt_rand(10,99);
                        $filename = $filename.'_'.$random.'.pdf';
                        // $filename = $_FILES['archivos']['name'][$key];   nombre original del archivo
                        $temporal = $_FILES['archivos']['tmp_name'][$key];
                        $directorio = 'Pruebas';

                        if (!file_exists($directorio)) {
                            mkdir($directorio, 0777, true);
                        }

                        $dir = opendir($directorio);
                        $ruta = $directorio.'/'.$filename;

                        if (move_uploaded_file($temporal, $ruta)) {
                            $data = $this->model->agregarPrueba($idsolicitud, $ruta, $filename);
                            if ($data == "ok") {
                                $msg = "si";
                            } else {
                                $msg = "Error, no se guardo el archivo, comunicate con el administrador";
                            }
                        } else {
                            $msg = "Ocurrio un error al guardar las pruebas";
                        }

                        closedir($dir);
                    } else {
                        $msg = "Error, Solo se permiten archivos pdf";
                    }
                } else {
                    $msg = "Error, Archivo no existe";
                }
            }

            echo $msg;
            die();
        }

        // Ver como esta quedando la respuesta
        public function verRespuesta(int $idSolicitud)
        {
            $this->session();
            $data['no'] = $idSolicitud;
            $data['solicitud'] = $this->model->getSolicitud($idSolicitud);
            $data['respuesta'] = $this->model->getRespuesta($idSolicitud);
            $data['pruebas'] = $this->model->getPruebas($idSolicitud);
            $this->views->getView($this, "respuesta", $data);
        }

        public function enviarRes(int $idsolicitud)
        {
            $this->session();
            $estado = 2;
            $data = $this->model->enviarRes($idsolicitud, $estado);
            if ($data == "ok") {
                $msg = "si";
            } else {
                $msg = "Error, Intentalo mas tarde";
            }

            echo $msg;
            die();
        }

        public function respondidas()
        {
            $this->session();
            $this->views->getView($this, "respondidas");
        }

        public function solicitudesRes()
        {
            $this->session();
            $estado = 2;
            $data = $this->model->getSolicitudes($estado);
        }

    }

?>