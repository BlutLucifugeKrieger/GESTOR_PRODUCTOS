<?php


    class boughtItemsModel{


        private $ID_ITEMS;
        private $ID_USUARIO;
        private $PRECIO;
        private  $NOMBRE_PRODUCTO;
        private  $REFERENCIA;
        private  $CATEGORIA;
        private $FECHA_VENTA;


        public function getID_ITEMS(){

            return $this->ID_ITEMS;
        }

        public function setID_ITEMS($ID_ITEMS){

            $this->ID_ITEMS = $ID_ITEMS;
        }

        

        public function getID_USUARIO(){

            return $this->ID_USUARIO;
        }

        public function setID_USUARIO($ID_USUARIO){

            $this->ID_USUARIO = $ID_USUARIO;
        }

        public function getPRECIO(){

            return $this->PRECIO;
        }

        public function setPRECIO($PRECIO){

            $this->PRECIO = $PRECIO;
        }



        public function getNOMBRE_PRODUCTO(){

            return $this->NOMBRE_PRODUCTO;
        }

        public function setNOMBRE_PRODUCTO($NOMBRE_PRODUCTO){

            $this->NOMBRE_PRODUCTO = $NOMBRE_PRODUCTO;
        }


        public function getREFERENCIA(){

            return $this->REFERENCIA;
        }

        public function setREFERENCIA($REFERENCIA){

            $this->REFERENCIA = $REFERENCIA;
        }


        public function getCATEGORIA(){

            return $this->CATEGORIA;
        }

        public function setCATEGORIA($CATEGORIA){

            $this->CATEGORIA = $CATEGORIA;
        }




        public function getFECHA_VENTA(){

            return $this->FECHA_VENTA;
        }

        public function setFECHA_VENTA($FECHA_VENTA){

            $this->FECHA_VENTA = $FECHA_VENTA;
        }




    }




?>