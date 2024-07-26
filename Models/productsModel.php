
<?php

    class productsModel{


        private  $ID;
        private  $NOMBRE_PRODUCTO;
        private  $REFERENCIA;
        private  $PRECIO;
        private  $PESO;
        private  $CATEGORIA;
        private  $STOCK;
        private  $FECHA_CREACION;
        private  $FECHA_ULTIMA_VENTA;




        public function getID(){

            return $this->ID;
        }

        public function setID($ID){

            $this->ID = $ID;

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

        public function getPRECIO(){

            return $this->PRECIO;
        }

        public function setPRECIO($PRECIO){

            $this->PRECIO = $PRECIO;

        }


        public function getPESO(){

            return $this->PESO;
        }

        public function setPESO($PESO){

            $this->PESO = $PESO;

        }


        public function getCATEGORIA(){

            return $this->CATEGORIA;
        }

        public function setCATEGORIA($CATEGORIA){

            $this->CATEGORIA = $CATEGORIA;

        }


        public function getSTOCK(){

            return $this->STOCK;
        }

        public function setSTOCK($STOCK){

            $this->STOCK = $STOCK;

        }

        public function getFECHA_CREACION(){

            return $this->FECHA_CREACION;
        }

        public function setFECHA_CREACION($FECHA_CREACION){

            $this->FECHA_CREACION = $FECHA_CREACION;

        }


        public function getFECHA_ULTIMA_VENTA(){

            return $this->FECHA_ULTIMA_VENTA;
        }

        public function setFECHA_ULTIMA_VENTA($FECHA_ULTIMA_VENTA){

            $this->FECHA_ULTIMA_VENTA = $FECHA_ULTIMA_VENTA;

        }


    }


?>