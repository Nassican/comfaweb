<?php

    class Usuario extends Controller
    {

        public function __construct()
        {
            session_start();
            if (!empty($_SESSION['activa'])) {
                header("location: ".base_url."Usuarios");
            }
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
            $this->views->getView($this, "perfil");
        }

        public function perfil()
        {
            $this->session();
            $this->views->getView($this, "perfil");
        }
    }

?>