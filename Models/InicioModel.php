<?php

    class InicioModel extends Query
    {
        private $idUser;
        public function __construct()
        {
            parent::__construct();
        }

        public function verPermiso(int $idUser)
        {
            $sql = "SELECT p.permiso, pu.idusuario FROM permisos p
                    INNER JOIN permisosusu pu
                    ON p.id = pu.idpermiso
                    WHERE pu.idusuario = $idUser";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function nameUser(int $idUser)
        {
            $sql = "SELECT nombre FROM usuarios WHERE id = $idUser";
            $data = $this->select($sql);
            return $data;
        }

    }

?>