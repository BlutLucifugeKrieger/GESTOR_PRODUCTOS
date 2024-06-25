<?php



    require __DIR__ . '/../Data/boughtItemsHandlers.php';

    header("Access-Control-Allow-Origin: *"); 
    header("Access-Control-Allow-Methods: POST,PUT,DELETE"); 
    header("Access-Control-Allow-Headers: Content-Type");


    class boughtItemsController{


        private $itemsServices;
        private $itemsHandler;

        

        public function __construct()
        {
            $this->itemsServices =new boughtItemsServices();
            $this->itemsHandler = new boughtItemsHandlers();
        }


        public function handleRequest(){


            
            $base_uri = '/prueba_tecnica_juanCastro/Controllers/boughtItemsController.php/allFromID';
            


            $endpoint = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);



            switch($_SERVER['REQUEST_METHOD']){


                case 'POST':

                    if($endpoint === $base_uri){

                        echo $this->getAllFromUser();
                        break;

                    }else{

                        echo $this->newItems();
                        break;
                    }
                
                case 'GET':

                    echo $this->allItems();
                    break;
                
                case 'PUT':

                    echo "put items";
                    break;
                
                case 'DELETE':

                    echo "delete items";
                    break;

            }





        }


        public function allItems(){


            try {
    
                $result = $this->itemsServices->getAllItems();
                return json_encode(['results'=> $result]);
    
            } catch (\Throwable $th) {
                
                echo $th;
                return json_encode(['results'=> 'Error, vuelve a intentarlo']);
            }
    
    
        }


        public function newItems(){


            try {
    
                $result = $this->itemsServices->handleCreateAnewItemBought();
                return json_encode($result);
    
            } catch (\Throwable $th) {
                
                echo $th;
                return json_encode(['results'=> 'Error, vuelve a intentarlo']);
            }
    
    
        }


        public function getAllFromUser(){


            try {
    
                $result = $this->itemsHandler->updateALLHandle();
                return $result;
    
            } catch (\Throwable $th) {
                
                echo $th;
                return json_encode(['results'=> 'Error, vuelve a intentarlo']);
            }



            
        }



    }


$start = new boughtItemsController();
$start->handleRequest();

?>