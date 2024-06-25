<?php



    class usersModel{


        private $ID_USUARIO;
        private $NOMBRE_USUARIO;
        private $CONTRASEÑA;
        private $DINERO;


        public function getID_USUARIO(){

            return $this->ID_USUARIO;
        }

        public function setID_USUARIO($ID_USUARIO){

            $this->ID_USUARIO = $ID_USUARIO;
        }

        

        public function getNOMBRE_USUARIO(){

            return $this->NOMBRE_USUARIO;
        }

        public function setNOMBRE_USUARIO($NOMBRE_USUARIO){

            $this->NOMBRE_USUARIO = $NOMBRE_USUARIO;
        }

        public function getCONTRASEÑA(){

            return $this->CONTRASEÑA;
        }

        public function setCONTRASEÑA($CONTRASEÑA){

            $this->CONTRASEÑA = $CONTRASEÑA;
        }


        public function getDINERO(){

            return $this->DINERO;
        }

        public function setDINERO($DINERO){

            $this->DINERO = $DINERO;
        }



    }




?>