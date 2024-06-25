
<?php

require __DIR__ . '/../Interfaces/usersHandlersInterface.php';
require __DIR__ . '/../Models/usersModel.php';


class usersHandlers implements usersHandlersInterface{


    private $users;
    private $userServices;

    public function __construct()
    {
        $this->users = new usersModel();
        $this->userServices = new usersServices();
    }



        public function newUserCreationHandle(){

            $inputData = json_decode(file_get_contents('php://input'),true);
    
            if(isset($inputData['NOMBRE_USUARIO']) && isset($inputData['CONTRASEÑA']) && !empty(trim($inputData['NOMBRE_USUARIO'])) && !empty(trim($inputData['CONTRASEÑA'])))
               
            {
                $this->handleSettingNewUser();
                $this->handleCreateAnewUser();
                
                return ['result'=>'Usuario creado correctamente!!!'];

            }else{
    
                return ['result'=>'Error, por favor, rellena todos los campos'];
            }
    
        }
        public function handleSettingNewUser(){

            $inputData = json_decode(file_get_contents('php://input'),true);

    
                $this->users->setNOMBRE_USUARIO($inputData['NOMBRE_USUARIO']);
                $this->users->setCONTRASEÑA($inputData['CONTRASEÑA']);
               
                

        }
        public function handleCreateAnewUser(){

            try {

    
                $result = $this->userServices->createNewUser(

                    $this->users
                );
    
                return $result;

            } catch (\Throwable $th) {
                echo $th;
                return  'Error, por favor vuelve a intentarlo';
            }
        }

        public function updateUserHandle(){

            $inputData = json_decode(file_get_contents('php://input'),true);
    
            if(isset($inputData['NOMBRE_USUARIO']) && isset($inputData['CONTRASEÑA']) && isset($inputData['DINERO']) && isset($inputData['ID_USUARIO']) && !empty(trim($inputData['NOMBRE_USUARIO'])) && !empty(trim($inputData['CONTRASEÑA'])) && !empty(trim($inputData['DINERO'])) && !empty(trim($inputData['ID_USUARIO'])))
               
            {
                $this->handleSettingAnUpdatedUser();
                $this->handleUpdateUser();
                
                return ['result'=>'Usuario actualizado correctamente!!!'];

            }else{
    
                return ['result'=>'Error, por favor, rellena todos los campos'];
            }

        }
        public function handleSettingAnUpdatedUser(){

            $inputData = json_decode(file_get_contents('php://input'),true);

    
                $this->users->setNOMBRE_USUARIO($inputData['NOMBRE_USUARIO']);
                $this->users->setCONTRASEÑA($inputData['CONTRASEÑA']);
                $this->users->setDINERO($inputData['DINERO']);
                $this->users->setID_USUARIO($inputData['ID_USUARIO']);

        }
        public function handleUpdateUser(){

            try {

    
                $result = $this->userServices->updateAuser(

                    $this->users
                );
    
                return $result;

            } catch (\Throwable $th) {
                echo $th;
                return  'Error, por favor vuelve a intentarlo';
            }

        }

        public function deleteUserHandle(){

            $inputData = json_decode(file_get_contents('php://input'),true);
    
            if(isset($inputData['ID_USUARIO']) && !empty(trim($inputData['ID_USUARIO'])))
               
            {
                $this->handleSettingsToDeleteAuser();
                $this->handleDeleteAnuser();
                
                return ['result'=>'Usuario eliminado correctamente!!!'];

            }else{
    
                return ['result'=>'Error, por favor, rellena todos los campos'];
            }

        }
        
        public function handleSettingsToDeleteAuser(){

            $inputData = json_decode(file_get_contents('php://input'),true);
            
            $this->users->setID_USUARIO($inputData['ID_USUARIO']);

        }

        public function handleDeleteAnuser(){

            try {

    
                $result = $this->userServices->deleteAuser(

                    $this->users
                );
    
                return $result;

            } catch (\Throwable $th) {
                echo $th;
                return  'Error, por favor vuelve a intentarlo';
            }


        }

        public function userLoginHandle(){

            $inputData = json_decode(file_get_contents('php://input'),true);
    
            if(isset($inputData['NOMBRE_USUARIO']) && isset($inputData['CONTRASEÑA']) && !empty(trim($inputData['NOMBRE_USUARIO'])) && !empty(trim($inputData['CONTRASEÑA'])))
               
            {
                $this->handleSettingsToLogin();
                $result = $this->handleLoginAnUser();
                return $result;

            }else{
    
                return ['result'=>'Error, por favor, rellena todos los campos'];
            }


        }

        public function handleSettingsToLogin(){

            $inputData = json_decode(file_get_contents('php://input'),true);

    
                $this->users->setNOMBRE_USUARIO($inputData['NOMBRE_USUARIO']);
                $this->users->setCONTRASEÑA($inputData['CONTRASEÑA']);
                
        }

        public function handleLoginAnUser(){


            try {

    
                $result = $this->userServices->userLogIn(

                    $this->users
                );
    
                return $result;

            } catch (\Throwable $th) {
                echo $th;
                return  'Error, por favor vuelve a intentarlo';
            }



        }

        public function userMONEYHandle(){
            
            $inputData = json_decode(file_get_contents('php://input'),true);
    
            if(isset($inputData['DINERO']) && isset($inputData['ID_USUARIO']) && !empty(trim($inputData['DINERO'])) && !empty(trim($inputData['ID_USUARIO'])))
               
            {
                $this->handleSettingsToMONEY();
                $this->handleMONEYAnUser();
                
                return ['result'=>'Recarga hecha satisfactoriamente!!!'];

            }else{
    
                return ['result'=>'Error, por favor, rellena todos los campos'];
            }

        }

        public function handleSettingsToMONEY(){

            $inputData = json_decode(file_get_contents('php://input'),true);

    
                
                $this->users->setDINERO($inputData['DINERO']);
                $this->users->setID_USUARIO($inputData['ID_USUARIO']);
                
        }

        public function handleMONEYAnUser(){


            try {

    
                $result = $this->userServices->increaseMoney(

                    $this->users
                );
    
                return $result;

            } catch (\Throwable $th) {
                echo $th;
                return  'Error, por favor vuelve a intentarlo';
            }



        }


        public function userActualMoneyHandle(){

            $inputData = json_decode(file_get_contents('php://input'),true);
    
            if(isset($inputData['ID_USUARIO']) && !empty(trim($inputData['ID_USUARIO'])))
               
            {
               $result = $this->handleSettingsToActualMoney();
                
                
                return ['result'=>$result];

            }else{
    
                return ['result'=>'Error, por favor, rellena todos los campos'];
            }


        }
        
        public function handleSettingsToActualMoney(){

            $inputData = json_decode(file_get_contents('php://input'),true);

    
                
                $this->users->setID_USUARIO($inputData['ID_USUARIO']);
           

            try {

    
                $result = $this->userServices->getMoneyFromUser($inputData['ID_USUARIO']);
    
                return $result;

            } catch (\Throwable $th) {
                echo $th;
                return  'Error, por favor vuelve a intentarlo';
            }



        }


}




?>