<?php

    class LoginModel extends Query
    {
        private $documento, $nombre, $clave;
        public function __construct()
        {
            parent::__construct();
        }

        // Mostrar datos

        public function getUsuario(string $documento, string $clave, int $estado)
        {
            $sql = "SELECT * FROM usuarios WHERE documento = '$documento' AND clave = '$clave' AND estado = '$estado'";
            $data = $this->select($sql);
            return $data;
        }

        public function getDocUsuario(string $documento, int $estado)
        {
            $sql = "SELECT * FROM usuarios WHERE documento = '$documento' AND estado = '$estado'";
            $data = $this->select($sql);
            return $data;
        }

        public function getTiposDoc()
        {
            $sql = "SELECT * FROM tiposdoc WHERE estado = 1";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function getGeneros()
        {
            $sql = "SELECT * FROM generos WHERE estado = 1";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function getDepartamentos()
        {
            $sql = "SELECT * FROM departamentos";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function getMunicipiosDepa(int $id)
        {
            $sql = "SELECT * FROM municipios WHERE iddepto = $id";
            $data = $this->selectAll($sql);
            return $data;
        }

        // CRUD

        public function registrarUsuario(int $tipodoc, string $documento, string $nombre, string $apellido, int $genero, string $fechanac, string $clave,
                                        string $departamento, string $municipio, string $direccion, string $email, string $telefono, string $fechareg)
        {
            $this->tipodoc = $tipodoc;
            $this->documento = $documento;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->genero = $genero;
            $this->fechanac = $fechanac;
            $this->clave = $clave;
            $this->departamento = $departamento;
            $this->municipio = $municipio;
            $this->direccion = $direccion;
            $this->email = $email;
            $this->telefono = $telefono;
            $this->fechareg = $fechareg;
            $sql = "INSERT INTO usuarios
                                (documento, idtipodoc, nombre, apellido, clave, iddepto, idmunicipio,
                                direccion, email, telefono, fechanac, idgenero, fechareg)
                                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $datos = array($this->documento, $this->tipodoc, $this->nombre, $this->apellido, $this->clave, $this->departamento, $this->municipio,
                            $this->direccion, $this->email, $this->telefono, $this->fechanac, $this->genero, $this->fechareg);
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