<?php

    class Inicio extends Controller
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

    }

?>