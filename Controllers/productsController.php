<?php

    require __DIR__ . '/../Services/productsServices.php';
    require __DIR__ . '/../Data/productsHandlers.php';

    header("Access-Control-Allow-Origin: *"); 
    header("Access-Control-Allow-Methods: POST,PUT,DELETE"); 
    header("Access-Control-Allow-Headers: Content-Type");


class productsController{

    private $services;
    
    private $productHandler;

    public function __construct()
    {
        
        $this->services = new productServices();
        $this->productHandler = new productsHandlers();
    }



    public function handleRequest(){


        switch($_SERVER['REQUEST_METHOD']){


            case 'GET':
                echo $this->allProducts();
                break;

            case 'POST':
                echo $this->newProduct();
                break;

            case 'PUT':
                echo $this->updateProduct();
                break;

            case 'DELETE':
                echo $this->deleteProduct();
                break;
        }



    }



    public function allProducts(){


        try {

            $result = $this->services->getAllProducts();
            return json_encode(['results'=> $result]);

        } catch (\Throwable $th) {
            
            echo $th;
            return json_encode(['results'=> 'Error, vuelve a intentarlo']);
        }


    }


    public function newProduct(){

        try {
            
            $result =  $this->productHandler->newProductCreationHandle();

            return json_encode($result);

        } catch (\Throwable $th) {
            
            echo $th;
            return json_encode(['result'=>'Error, vuelve a intentarlo']);
        }
      

    }



    public function updateProduct(){


        try {
            
            $result = $this->productHandler->updateProductHandle();

            return json_encode($result);

        } catch (\Throwable $th) {
            
            echo $th;
            return json_encode(['result'=>'Error, vuelve a intentarlo']);
        }


    }

    
    public function deleteProduct(){


        try {

            $result = $this->productHandler->deleteProductHandle();
            return json_encode($result);

        } catch (\Throwable $th) {
            
            echo $th;
            return json_encode(['result'=>'Error, vuelve a intentarlo']);
        }
    }


    




}


$products_ = new productsController();
$products_->handleRequest();
?>

