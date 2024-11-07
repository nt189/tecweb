<?php
    namespace TECWEB\MYAPI;

    abstract class DataBase {
        protected $conexion;

        public function __construct($user, $pass, $db) {
            $this->conexion = @mysqli_connect(
                'localhost',
                $user,
                $pass,
                $db
            );
        
            // NOTA: si la conexión falló, $this->conexion contendrá false
            if (!$this->conexion) {
                echo ('¡Base de datos NO conectada!');
            }
        }
    }
    // pruebas de conexion
    // $dat = new DataBase('root', 'zP*liGgdxEbBXjyk', 'marketzone');
?>
