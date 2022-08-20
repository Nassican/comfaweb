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

        public function getTiposDoc()
        {
            $sql = "SELECT * FROM tiposdoc WHERE estado = 1 ORDER BY nomdoc";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function getTiposUsu()
        {
            $sql = "SELECT * FROM tiposusuario WHERE estado = 1 ORDER BY tipo";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function getAreas()
        {
            $sql = "SELECT * FROM areas WHERE estado = 1 ORDER BY area";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function getSolicitudes(int $idusuario)
        {
            $sql = "SELECT b.id, tp.pqrsf, b.fechareg, b.estado FROM buzon AS b
                    INNER JOIN tipospqrsf AS tp ON b.idtipo = tp.id
                    WHERE (b.estado = 1 OR b.estado = 2) AND idusuario = $idusuario ORDER BY b.fechareg DESC";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function getSolicitud(int $idSolicitud)
        {
            $sql = "SELECT
                    b.id, tp.pqrsf, b.descripcion, b.fechareg, b.estado,
                    u.documento, u.nombre, u.apellido, u.direccion, u.email, u.telefono,
                    tpu.tipo AS tipousu, a.area, a.piso
                    FROM buzon AS b
                    INNER JOIN tipospqrsf AS tp
                    ON b.idtipo = tp.id
                    INNER JOIN usuarios AS u
                    ON b.idusuario = u.id
                    INNER JOIN tiposusuario AS tpu
                    ON b.idtipousu = tpu.id
                    INNER JOIN areas AS a
                    ON b.idarea = a.id
                    WHERE b.id = $idSolicitud";
            $data = $this->select($sql);
            return $data;
        }

        public function crearSolicitud(int $idusuario, int $idtipo, int $idtipousu, int $idarea, string $descripcion, string $fechareg)
        {
            $this->idusuario = $idusuario;
            $this->idtipo = $idtipo;
            $this->idarea = $idarea;
            $this->idtipousu = $idtipousu;
            $this->descripcion = $descripcion;
            $this->fechareg = $fechareg;

            $sql = "INSERT INTO buzon(idusuario, idtipo, idtipousu, idarea, descripcion, fechareg) VALUES (?,?,?,?,?,?)";
            $datos = array($this->idusuario, $this->idtipo, $this->idtipousu, $this->idarea, $this->descripcion, $this->fechareg);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
            return $res;
        }

        public function vSolicitud(int $idsolicitud)
        {
            $sql = "SELECT * FROM buzon WHERE id = $idsolicitud";
            $data = $this->select($sql);
            return $data;
        }

        public function getRespuesta(int $idsolicitud)
        {
            $sql = "SELECT * FROM respuestas WHERE idbuzon = $idsolicitud";
            $data = $this->select($sql);
            return $data;
        }

        public function getPruebas(int $idsolicitud)
        {
            $sql = "SELECT * FROM pruebas WHERE idbuzon = $idsolicitud";
            $data = $this->selectAll($sql);
            return $data;
        }

    }

?>