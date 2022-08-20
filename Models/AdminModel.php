<?php

    class AdminModel extends Query
    {
        private $documento, $nombre, $clave, $id, $estado;
        public function __construct()
        {
            parent::__construct();
        }


        public function getSolicitudes(int $estado)
        {
            $sql = "SELECT b.id, tp.pqrsf, b.fechareg, b.estado FROM buzon AS b
                    INNER JOIN tipospqrsf AS tp ON b.idtipo = tp.id
                    WHERE (b.estado = 1 OR b.estado = 2) AND b.estado = $estado ORDER BY b.fechareg DESC, b.id DESC";
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

        public function enviarRespuesta(int $idadmin, int $idsolicitud, string $pregunta, string $investigacion, string $conclusion, string $fechareg)
        {
            $this->idsolicitud = $idsolicitud;
            $this->idadmin = $idadmin;
            $this->pregunta = $pregunta;
            $this->investigacion = $investigacion;
            $this->conclusion = $conclusion;
            $this->fechareg = $fechareg;

            $sql = "INSERT INTO respuestas(idbuzon, idadmin, problema, investigacion, conclusion, fechareg) VALUES (?,?,?,?,?,?)";
            $datos = array($this->idsolicitud, $this->idadmin, $this->pregunta, $this->investigacion, $this->conclusion, $this->fechareg);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
            return $res;
        }

        public function verificarPermiso(int $idadmin, string $permiso)
        {
            $sql = "SELECT p.permiso, pu.idusuario FROM permisos p
                    INNER JOIN permisosusu pu
                    ON p.id = pu.idpermiso
                    WHERE pu.idusuario = $idadmin
                    AND p.permiso = '$permiso'";
            $data = $this->select($sql);
            return $data;
        }

        public function vRespuesta(int $idsolicitud)
        {
            $sql = "SELECT * FROM respuestas WHERE idbuzon = $idsolicitud";
            $data = $this->select($sql);
            return $data;
        }

        public function vPruebas(int $idsolicitud)
        {
            $sql = "SELECT count(*) AS contador FROM pruebas WHERE idbuzon = $idsolicitud";
            $data = $this->select($sql);
            return $data;
        }

        public function agregarPrueba(int $idsolicitud, string $ruta, string $nombre)
        {
            $this->idsolicitud = $idsolicitud;
            $this->ruta = $ruta;
            $this->nombre = $nombre;

            $sql = "INSERT INTO pruebas(idbuzon, ruta, nombre) VALUES (?,?,?)";
            $datos = array($this->idsolicitud, $this->ruta, $this->nombre);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
            return $res;
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

        public function enviarRes(int $idsolicitud, int $estado)
        {
            $this->id = $idsolicitud;
            $this->estado = $estado;

            $sql = "UPDATE buzon SET estado = ? WHERE id = ?";
            $datos = array($this->estado, $this->id);
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