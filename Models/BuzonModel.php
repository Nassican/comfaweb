<?php

    class BuzonModel extends Query
    {
        private $idpaciente, $idacudiente;
        public function __construct()
        {
            parent::__construct();
        }

        public function getTipospqrsf()
        {
            $sql = "SELECT * FROM tipospqrsf WHERE estado = 1 ORDER BY pqrsf";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function crearSolicitud(int $idpaciente, int $idacudiente, int $idtipo, string $descripcion, string $fechareg)
        {
            $this->idpaciente = $idpaciente;
            $this->idacudiente = $idacudiente;
            $this->idtipo = $idtipo;
            $this->descripcion = $descripcion;
            $this->fechareg = $fechareg;

            $sql = "INSERT INTO buzon(idusuario, idpaciente, idtipo, descripcion, fechareg) VALUES (?,?,?,?,?)";
            $datos = array($this->idpaciente, $this->idacudiente, $this->idtipo, $this->descripcion, $this->fechareg);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
            return $res;
        }

    }

?>