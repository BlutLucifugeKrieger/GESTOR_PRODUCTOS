<?php

    require __DIR__ . '/../Config/Config.php';
    require __DIR__ . '/../Interfaces/productsInterface.php';

    class productServices implements productsInterface {


        private $connection;


        public function __construct()
        {
            $this->connection = new dbConnection();
        }



        public function getAllProducts(){

            $list = [];

            $query = "SELECT*FROM products";

            $val = mysqli_query($this->connection->mysqlDBConnection(),$query);

            while($key = mysqli_fetch_assoc($val)){

                array_push($list,$key);
            }

            return $list;



        }


        public function createNewProduct(productsModel $p){

            $query = "INSERT INTO PRODUCTS(NOMBRE_PRODUCTO,REFERENCIA,PRECIO,PESO,CATEGORIA,STOCK,FECHA_CREACION,FECHA_ULTIMA_VENTA) VALUES (?,?,?,?,?,?,?,?)";
            $actualDateAndTime = $this->actualDateTime();
            $actualDate_ = $this->actualDate();

            $conn = $this->connection->mysqlDBConnection();
            $val = $conn->prepare($query);

            $nombre = $p->getNOMBRE_PRODUCTO();
            $referencia = $p->getREFERENCIA();
            $precio = $p->getPRECIO();
            $peso = $p->getPESO();
            $categoria = $p->getCATEGORIA();
            $stock = $p->getSTOCK();


            $val->bind_param('ssiisiss',$nombre,$referencia,$precio,$peso,$categoria,$stock,$actualDate_,$actualDateAndTime);
            $val->execute();

            $val->close();
            $conn->close();


        }
        public function updateAproduct(productsModel $p){

            $query = "UPDATE PRODUCTS SET NOMBRE_PRODUCTO=?, REFERENCIA=?,PRECIO=?,PESO=?,CATEGORIA=?,STOCK=?,FECHA_ULTIMA_VENTA=? WHERE ID=?";
            
            $conn = $this->connection->mysqlDBConnection();
            $val = $conn->prepare($query);

            $id = $p->getID();
            $nombre = $p->getNOMBRE_PRODUCTO();
            $referencia = $p->getREFERENCIA();
            $precio = $p->getPRECIO();
            $peso = $p->getPESO();
            $categoria = $p->getCATEGORIA();
            $stock = $p->getSTOCK();
            $fecha_ultima_venta = $this->actualDateTime();

            $val->bind_param('ssiisisi',$nombre,$referencia,$precio,$peso,$categoria,$stock,$fecha_ultima_venta,$id);
            $val->execute();

            $val->close();
            $conn->close();

            

        }




        public function deleteAproduct(productsModel $p){

            $query = "DELETE FROM PRODUCTS WHERE ID=?";

            $conn = $this->connection->mysqlDBConnection();
            $val = $conn->prepare($query);


            $id = $p->getID();

            $val->bind_param('i',$id);
            $val->execute();

            $val->close();
            $conn->close();

        }


        public function actualDateTime(){

            $value = new DateTime();
            return $value->format('Y-m-d H:i:s');

        }

        public function actualDate(){

            $value = new DateTime();

            return $value->format('Y-m-d');
        }





        





    }


?>