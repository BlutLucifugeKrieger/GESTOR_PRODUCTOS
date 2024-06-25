
<?php

    require __DIR__ . '/../Interfaces/boughtItemsHandlersInterface.php';
    require __DIR__ . '/../Models/boughtItemsModel.php';
    require __DIR__ . '/../Services/boughtItemsServices.php';
    require __DIR__ . '/../Models/usersModel.php';

    class boughtItemsHandlers implements boughtItemsHandlersInterface{


        private $items;
        private $services;
        private $products;
        private $user;
        
        public function __construct()
        {
            $this->items = new boughtItemsModel();
            $this->services = new boughtItemsServices();
            $this->products = new productsModel();
            $this->user = new usersModel();
        }

    



        public function newItemBoughtCreationHandle() {
            $inputData = json_decode(file_get_contents('php://input'), true);
        
            if (isset($inputData['ID_USUARIO']) && isset($inputData['PRECIO']) && isset($inputData['NOMBRE_PRODUCTO']) && isset($inputData['REFERENCIA']) && isset($inputData['CATEGORIA']) && isset($inputData['STOCK']) && isset($inputData['DINERO']) && !empty(trim($inputData['ID_USUARIO'])) && !empty(trim($inputData['PRECIO'])) && !empty(trim($inputData['NOMBRE_PRODUCTO'])) && !empty(trim($inputData['REFERENCIA'])) && !empty(trim($inputData['CATEGORIA'])) && !empty(trim($inputData['STOCK'])) && !empty(trim($inputData['DINERO']))) {
        
                
                
        
                return ['status'=>'Ok'];
        
            } else {
                return ['result' => 'Error, por favor, rellena todos los campos'];
            }
        }


       


        public function updateALLHandle(){

            $inputData = json_decode(file_get_contents('php://input'), true);
        
            if (isset($inputData['ID_USUARIO'])  && !empty(trim($inputData['ID_USUARIO']))){
        
                
                $result = $this->handleSettingAnALLItem();
        
                return json_encode($result);
        
            } else {
                return json_encode(['result' => 'Error, por favor, rellena todos los campos']);
            }

        }   

        public function handleSettingAnALLItem(){

            
            $inputData = json_decode(file_get_contents('php://input'),true);

            try {

                $id = $inputData['ID_USUARIO'];
    
                $result = $this->services->getAllitemsOfAnCustomer(

                    $id
                );
    
                return $result;

            } catch (\Throwable $th) {
                echo $th;
                return  'Error, por favor vuelve a intentarlo';
            }


        }


    


    }



?>