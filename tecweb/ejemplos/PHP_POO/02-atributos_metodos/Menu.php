<?php
    class Menu{
        private $enlaces = array();
        private $titulo = array();

        public function cargar_opcion( $link, $title ){
            $this->enlaces[] = $link;
            $this->titulo[] = $title;
        }

        public function mostrar(){
            for($i=0; $i < count($this->enlaces); $i++){
                echo '<a href="'.$this->enlaces.'">'.$this->titulo[$i].'</a>';

                if( $i < count($this->enlaces)-1 ){
                    
                }
            }
        }
    }
?>