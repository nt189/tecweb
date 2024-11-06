<?php
    require_once __DIR__ . '/Cabecera.php';
    require_once __DIR__ . '/Cuerpo.php';
    require_once __DIR__ . '/Pie.php';

    class Pagina{
        private $cabecera;
        private $cuerpo;
        private $pie;

        public function __contruct( $title, $location, $message ){
            $this->cabecera = new Cabecera( $title, $location );   
            $this->cuerpo = new Cuerpo();   
            $this->pie = new Pie( $message ); 
        }

        public function insertar_cuerpo($text){
            $this->cuerpo->insertar_parrafo($text);
        }
    }
?>