<?php

    class Inicio extends Controller
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

        public function index()
        {
            $this->session();
            // enviar a la vista para logearse
            $this->views->getView($this, "index");
        }

        public function menuPermiso()
        {
            $this->session();
            $idUser = $_SESSION['idusuario'];
            $permisos = $this->model->verPermiso($idUser);
            if (!empty($permisos)) {
                for ($i=0; $i < count($permisos); $i++) {
                    if ($permisos[$i]['permiso'] == 'admin') {
                        $data = '<a class="nav-link collapsed" href="'.base_url.'Buzon" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                                        <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                                                        Administracion
                                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                    </a>
                                                    <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                                        <nav class="sb-sidenav-menu-nested nav">
                                                            <a class="nav-link" href="'.base_url.'Admin/buzon"><i class="fas fa-envelope m-2"></i> Buzon</a>
                                                            <a class="nav-link" href="'.base_url.'Admin/respondidas"><i class="fas fa-tasks m-2"></i> Respondidas</a>
                                                        </nav>
                                                    </div>';
                    } else {
                        $data = '';
                    }
                }
            } else {
                $data = '';
            }

            echo $data;
            die();
        }

        public function nameUser()
        {
            $this->session();
            $idUser = $_SESSION['idusuario'];
            $nameUser = $this->model->nameUser($idUser);
            if (!empty($nameUser)) {
                $data = $nameUser['nombre'];
            } else {
                $data = '';
            }

            echo $data;
            die();
        }

    }

?>