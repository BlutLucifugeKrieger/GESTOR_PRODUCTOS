<?php

    require __DIR__ . '/../Services/usersServices.php';
    require __DIR__ . '/../Data/usersHandlers.php';

    header("Access-Control-Allow-Origin: *"); 
    header("Access-Control-Allow-Methods: POST,PUT,DELETE"); 
    header("Access-Control-Allow-Headers: Content-Type");



    class usersController {



        private $userServices;
        private $userHandlers;

        
        public function __construct()
        {
            $this->userServices = new usersServices();
            $this->userHandlers = new usersHandlers();
        }


        public function handleRequest(){

            $base_uri = '/prueba_tecnica_juanCastro/Controllers/usersController.php/userLogin';
            $base_uri2 = '/prueba_tecnica_juanCastro/Controllers/usersController.php/money';
            $base_uri3 = '/prueba_tecnica_juanCastro/Controllers/usersController.php/actualUserMoney';

            $endpoint = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);


            switch($_SERVER['REQUEST_METHOD']){


                case 'GET':

                    echo $this->allUsers();
                    break;

                case 'POST':

                        if($endpoint === $base_uri){

                            echo $this->login();
                            break;

                            }else if($endpoint === $base_uri2){

                              echo $this->updateMoney();
                              break;

                            }else if($endpoint === $base_uri3){
                                echo $this->actualMoney();
                                break;
                                
                            }else{

                                echo $this->newUser();
                                break;
                            }

                    

                case 'PUT':

                    echo $this->updateUser();
                    break;

                case 'DELETE':

                    echo $this->deleteUser();
                    break;

            }


        }



        public function allUsers(){


            try {
                
                $result = $this->userServices->getAllUsers();
                return json_encode($result);

            } catch (\Throwable $th) {
                
                echo $th;
                return json_encode(['result'=>'Error, por favor vuelva a intentarlo']);
            }


        }

        public function newUser(){

            try {
                
               $result =  $this->userHandlers->newUserCreationHandle();
                return json_encode($result);

            } catch (\Throwable $th) {

                echo $th;
                return json_encode(['result'=>'Error, por favor vuelva a intentarlo']);
            }


        }


        public function updateUser(){

            try {
                
                $result = $this->userHandlers->updateUserHandle();
                return json_encode($result);

            } catch (\Throwable $th) {
                
                echo $th;
                return json_encode(['result'=>'Error, por favor vuelva a intentarlo']);
            }
        }


        public function deleteUser(){

            try {
                
                $result = $this->userHandlers->deleteUserHandle();
                return json_encode($result);

            } catch (\Throwable $th) {
                
                echo $th;
                return json_encode(['result'=>'Error, por favor vuelva a intentarlo']);

            }


        }


        public function login(){


            try {
                
                $result = $this->userHandlers-> userLoginHandle();
                return json_encode(['result'=>$result]);

            } catch (\Throwable $th) {
                
                echo $th;
                return json_encode(['result'=>'Error, por favor vuelva a intentarlo']);

            }


        }


        public function updateMoney(){

            try {
                
                $result = $this->userHandlers-> userMONEYHandle();
                return json_encode(['result'=>$result]);

            } catch (\Throwable $th) {
                
                echo $th;
                return json_encode(['result'=>'Error, por favor vuelva a intentarlo']);

            }

        }

        public function actualMoney(){


            try {
                
                $result = $this->userHandlers-> userActualMoneyHandle();
                return json_encode($result);

            } catch (\Throwable $th) {
                
                echo $th;
                return json_encode(['result'=>'Error, por favor vuelva a intentarlo']);

            }

        }

        


    }


    $start = new usersController();
    $start->handleRequest();

?>