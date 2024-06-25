<?php

    require __DIR__ . '/../Models/productsModel.php';
    require __DIR__ . '/../Interfaces/productsHandlersInterface.php';

    class productsHandlers implements productsHandlersInterface{


        private $products;
        private $services;


        public function __construct()
        {
            $this->products = new productsModel();
            $this->services = new productServices();
        }



        public function newProductCreationHandle(){

            $inputData = json_decode(file_get_contents('php://input'),true);
    
            if(isset($inputData['NOMBRE_PRODUCTO']) && isset($inputData['REFERENCIA']) && isset($inputData['PRECIO']) && isset($inputData['PESO']) && isset($inputData['CATEGORIA']) && isset($inputData['STOCK']) && !empty(trim($inputData['NOMBRE_PRODUCTO'])) && !empty(trim($inputData['REFERENCIA'])) && !empty(trim($inputData['PRECIO'])) && !empty(trim($inputData['PESO'])) && !empty(trim($inputData['CATEGORIA'])) && !empty(trim($inputData['STOCK'])))
               
            {
                $this->handleSettingNewProduct();
                $this->handleCreateAnewProduct();
                
                return ['result'=>'Producto, guardado correctamente!!!'];

            }else{
    
                return ['result'=>'Error, por favor, rellena todos los campos'];
            }
    
    
        }



        public function handleSettingNewProduct(){



            $inputData = json_decode(file_get_contents('php://input'),true);

    
                $this->products->setNOMBRE_PRODUCTO($inputData['NOMBRE_PRODUCTO']);
                $this->products->setREFERENCIA($inputData['REFERENCIA']);
                $this->products->setPRECIO($inputData['PRECIO']);
                $this->products->setPESO($inputData['PESO']);
                $this->products->setCATEGORIA($inputData['CATEGORIA']);
                $this->products->setSTOCK($inputData['STOCK']);
    
                
        }



        public function handleCreateAnewProduct() {

            try {

              
    
                $result = $this->services->createNewProduct(

                    $this->products
                );
    
                return $result;

            } catch (\Throwable $th) {
                echo $th;
                return  'Error, por favor vuelve a intentarlo';
            }
        }





        public function updateProductHandle(){

            $inputData = json_decode(file_get_contents('php://input'),true);

            if(isset($inputData['NOMBRE_PRODUCTO']) && isset($inputData['REFERENCIA']) && isset($inputData['PRECIO']) && isset($inputData['PESO']) && isset($inputData['CATEGORIA']) && isset($inputData['STOCK']) && isset($inputData['ID']) && !empty($inputData['NOMBRE_PRODUCTO']) && !empty($inputData['REFERENCIA']) && !empty($inputData['PRECIO']) && !empty($inputData['PESO']) && !empty($inputData['CATEGORIA']) && !empty($inputData['STOCK']) && !empty($inputData['ID']))
               
            {

                $this->handleSettingAnUpdatedProduct();
                $this->handleUpdateAproduct();
                return ['result'=>'Producto actualizado correctamente'];
                
            }else{
    
                return ['result'=>'Error, por favor, rellena todos los campos'];;
            }


        }

        public function handleSettingAnUpdatedProduct(){

            $inputData = json_decode(file_get_contents('php://input'),true);

            
                $this->products->setNOMBRE_PRODUCTO($inputData['NOMBRE_PRODUCTO']);
                $this->products->setREFERENCIA($inputData['REFERENCIA']);
                $this->products->setPRECIO($inputData['PRECIO']);
                $this->products->setPESO($inputData['PESO']);
                $this->products->setCATEGORIA($inputData['CATEGORIA']);
                $this->products->setSTOCK($inputData['STOCK']);
                $this->products->setID($inputData['ID']);

            



        }


        public function handleUpdateAproduct(){


            try {
                

                $result = $this->services->updateAproduct($this->products);

                return $result;

            } catch (\Throwable $th) {
                
                echo $th;
                return "Error al actualizar el registro, por favor vuelva a intentarlo";
            }



        }



        public function deleteProductHandle(){

            $inputData = json_decode(file_get_contents('php://input'),true);


            if(isset($inputData['ID']) && !empty(trim($inputData['ID'])))
               
            {
                $this->handleSettingsToDeleteAProduct();
                $this->handleDeleteAproduct();
                
                return ['result'=>'Producto, eliminado correctamente!!!'];

            }else{
    
                return ['result'=>'Error, por favor, rellena todos los campos'];
            }
    


        }



        public function handleSettingsToDeleteAProduct(){

            $inputData = json_decode(file_get_contents('php://input'),true);

            
                
                $this->products->setID($inputData['ID']);



        }


        public function handleDeleteAproduct(){


            try {
                

                $result = $this->services->deleteAproduct($this->products);

                return $result;

            } catch (\Throwable $th) {
                
                echo $th;
                return "Error al actualizar el registro, por favor vuelva a intentarlo";
            }



        }





    }




?>