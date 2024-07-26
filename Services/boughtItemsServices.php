<?php

    require __DIR__ . '/../Interfaces/boughtItemsInterface.php';
    require __DIR__ . '/../Config/Config.php';
    require __DIR__ . '/../Models/productsModel.php';

    class boughtItemsServices implements boughtItemsInterface{


        private $connection;


        public function __construct()
        {
            $this->connection = new dbConnection();
            
        }




        public function getAllItems(){

            $list = [];

            $query = "SELECT*FROM BOUGHT_ITEMS";

            $conn = mysqli_query($this->connection->mysqlDBConnection(),$query);

            while($key = mysqli_fetch_assoc($conn)){


                array_push($list,$key);


            }
            
            return $list;


        }


    



        public function createNewItem(boughtItemsModel $b){

            $query = "INSERT INTO BOUGHT_ITEMS(ID_USUARIO,PRECIO,NOMBRE_PRODUCTO,REFERENCIA,CATEGORIA,FECHA_VENTA) VALUES (?,?,?,?,?,?)";
            $actualDateAndTime = $this->actualDateTime();
           

            $conn = $this->connection->mysqlDBConnection();
            $val = $conn->prepare($query);

            $id_usuario = $b->getID_USUARIO();
            $nombre = $b->getNOMBRE_PRODUCTO();
            $referencia = $b->getREFERENCIA();
            $precio = $b->getPRECIO();
            $categoria = $b->getCATEGORIA();
          


            $val->bind_param('iissss',$id_usuario,$precio,$nombre,$referencia,$categoria,$actualDateAndTime);
            $val->execute();

            $val->close();
            $conn->close();

        }



    
        public function actualDateTime(){

            $value = new DateTime();
            return $value->format('Y-m-d H:i:s');
        }


        public function buyAnItem($itemPrice, $productID, $userID, $userCash) {
            $query = "SELECT PRECIO, NOMBRE_PRODUCTO, REFERENCIA, CATEGORIA FROM PRODUCTS WHERE ID = ?";
            
            $conn = $this->connection->mysqlDBConnection();
            $val = $conn->prepare($query);
            $val->bind_param('i', $productID);
            $val->execute();
            
            $result = $val->get_result();
            $row = $result->fetch_assoc();
            $precio = $row['PRECIO'];
            $nombre_producto = $row['NOMBRE_PRODUCTO'];
            $referencia = $row['REFERENCIA'];
            $categoria = $row['CATEGORIA'];
            
            $val->close();
            $conn->close();
            
           
            $resultMessage = $this->comparePrices($precio, $productID, $userID, $userCash, $nombre_producto, $referencia, $categoria);
            
            return $resultMessage;
        }
        
        
        

        public function comparePrices($itemPrice, $productID, $userID, $userCash, $nombre, $referencia, $categoria){

            
            $queryStock = "SELECT STOCK FROM PRODUCTS WHERE ID = ?";
            
            $conn = $this->connection->mysqlDBConnection();
            $valStock = $conn->prepare($queryStock);
            $valStock->bind_param('i', $productID);
            $valStock->execute();
            
            $resultStock = $valStock->get_result();
            $rowStock = $resultStock->fetch_assoc();
            $stock = $rowStock['STOCK'];
            
            $valStock->close();
            
            
            if ($stock > 0 && $userCash >= $itemPrice) {
                
                $queryInsert = "INSERT INTO BOUGHT_ITEMS(ID_USUARIO, PRECIO, NOMBRE_PRODUCTO, REFERENCIA, CATEGORIA, FECHA_VENTA) VALUES (?, ?, ?, ?, ?, ?)";
                $queryUpdateStock = "UPDATE PRODUCTS SET STOCK = STOCK - 1, FECHA_ULTIMA_VENTA = ? WHERE ID = ?";
                
                $actualDateAndTime = $this->actualDateTime(); 
                
                
                $valInsert = $conn->prepare($queryInsert);
                $valInsert->bind_param('iissss', $userID, $itemPrice, $nombre, $referencia, $categoria, $actualDateAndTime);
                $valInsert->execute();
                $valInsert->close();
                
                
                $valUpdateStock = $conn->prepare($queryUpdateStock);
                $valUpdateStock->bind_param('si', $actualDateAndTime, $productID);
                $valUpdateStock->execute();
                $valUpdateStock->close();
                
                $conn->close();
                
                return ['result' => "Compra realizada correctamente"];
            } else {
                
                if ($stock <= 0) {
                    return ['result' => "Error, no hay suficiente stock disponible"];
                } else {
                    return ['result' => "Error, no tienes suficiente dinero"];
                }
            }
        }
        
        
        
        public function getAllitemsOfAnCustomer($id){

            $query = "SELECT*FROM BOUGHT_ITEMS WHERE ID_USUARIO=?";

            $list = [];
        
            $conn = $this->connection->mysqlDBConnection();
            $val = $conn->prepare($query);
        
            
            
        
            $val->bind_param('i', $id);
            $val->execute();
        
            
            $result = $val->get_result();
        
            
            
                while ($row = $result->fetch_assoc()) {
                    $list[] = $row;
               }
            
        
            $val->close();
            $conn->close();
        
            return $list;
            

        }


        public function handleCreateAnewItemBought() {
            
            $inputData = json_decode(file_get_contents('php://input'), true);
        
            try {
                
                if (isset($inputData['ID_USUARIO']) && isset($inputData['PRECIO']) && isset($inputData['NOMBRE_PRODUCTO']) && isset($inputData['REFERENCIA']) && isset($inputData['CATEGORIA']) && isset($inputData['DINERO']) &&
                    !empty(trim($inputData['ID_USUARIO'])) && !empty(trim($inputData['PRECIO'])) && !empty(trim($inputData['NOMBRE_PRODUCTO'])) && !empty(trim($inputData['REFERENCIA'])) && !empty(trim($inputData['CATEGORIA'])) && !empty(trim($inputData['DINERO']))) {
        
                    
                    $productID = $inputData['ID'];
                    $userID = $inputData['ID_USUARIO'];
        
                    
                    $queryStock = "SELECT STOCK FROM PRODUCTS WHERE ID = ?";
                    
                    $conn = $this->connection->mysqlDBConnection();
                    $valStock = $conn->prepare($queryStock);
                    $valStock->bind_param('i', $productID);
                    $valStock->execute();
                    
                    $resultStock = $valStock->get_result();
                    $rowStock = $resultStock->fetch_assoc();
                    $stock = $rowStock['STOCK'];
                    
                    $valStock->close();
                    $conn->close();
        
                   
                    if ($stock > 0) {
                       
                        $itemPrice = $inputData['PRECIO'];
                        $userCash = $inputData['DINERO'];
                        $nombre = $inputData['NOMBRE_PRODUCTO'];
                        $referencia = $inputData['REFERENCIA'];
                        $categoria = $inputData['CATEGORIA'];
        
                       
                        $result = $this->buyAnItem($itemPrice, $productID, $userID, $userCash, $nombre, $referencia, $categoria);
        
                        return $result;
                    } else {
                        
                        return ['result' => 'Error, no hay suficiente stock disponible para este producto'];
                    }
                } else {
                    
                    return ['result' => 'Error, por favor, rellena todos los campos'];
                }
            } catch (\Throwable $th) {
                echo $th; 
                return ['result' => 'Error, por favor vuelve a intentarlo'];
            }
        }
        

    }






?>