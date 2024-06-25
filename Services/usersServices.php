<?php

    require __DIR__ . '/../Config/Config.php';
    require __DIR__ . '/../Interfaces/usersInterface.php';

    class usersServices implements usersInterface{


        private $connection;
        
        public function __construct()
        {
            $this->connection = new dbConnection();
        }



        public function getAllUsers(){

            $list = [];

            $query = "SELECT*FROM USERS";

            $val = mysqli_query($this->connection->mysqlDBConnection(),$query);

            while($key = mysqli_fetch_assoc($val)){

                array_push($list,$key);
            }

            return $list;

        }
        public function createNewUser(usersModel $u){

            $query = "INSERT INTO USERS(NOMBRE_USUARIO,CONTRASEÑA,DINERO) VALUES(?,?,?)";

            $conn = $this->connection->mysqlDBConnection();
            $val = $conn->prepare($query);

            $usuario = $u->getNOMBRE_USUARIO();
            $contraseña = $u->getCONTRASEÑA();
            $dinero = 100000000;      

            $val->bind_param('ssi',$usuario,$contraseña,$dinero);
            $val->execute();

            $val->close();
            $conn->close();


        }
        public function updateAuser(usersModel $u){

            $query ="UPDATE USERS SET NOMBRE_USUARIO=?, CONTRASEÑA=?, DINERO=? WHERE ID_USUARIO=?";

            $conn = $this->connection->mysqlDBConnection();
            $val = $conn->prepare($query);

            $usuario = $u->getNOMBRE_USUARIO();
            $contraseña = $u->getCONTRASEÑA();
            $dinero = $u->getDINERO();
            $id = $u->getID_USUARIO();

            $val->bind_param('ssii',$usuario,$contraseña,$dinero,$id);
            $val->execute();

            $val->close();
            $conn->close();

        }

        public function deleteAuser(usersModel $u){

            $query = "DELETE FROM USERS WHERE ID_USUARIO=?";

            $conn = $this->connection->mysqlDBConnection();

            $val = $conn->prepare($query);

            $id = $u->getID_USUARIO();

            $val->bind_param('i',$id);
            $val->execute();

            $val->close();
            $conn->close();

        }
        


        public function userLogIn(usersModel $u){

            $query = "SELECT * FROM USERS WHERE NOMBRE_USUARIO=? AND CONTRASEÑA=?";
            $list = [];
        
            $conn = $this->connection->mysqlDBConnection();
            $val = $conn->prepare($query);
        
            $usuario = $u->getNOMBRE_USUARIO();
            $contraseña = $u->getCONTRASEÑA();
        
            $val->bind_param('ss', $usuario, $contraseña);
            $val->execute();
        
            
            $result = $val->get_result();
        
            
            
                while ($row = $result->fetch_assoc()) {
                    $list[] = $row;
               }
            
        
            $val->close();
            $conn->close();
        
            return $list;
        }
       
        
        public function increaseMoney(usersModel $u){

            $query = "UPDATE USERS SET DINERO=? WHERE ID_USUARIO=?";
            $conn = $this->connection->mysqlDBConnection();
            $val = $conn->prepare($query);

            $dinero = $u->getDINERO();
            $id = $u->getID_USUARIO();

            $val->bind_param('ii',$dinero,$id);
            $val->execute();

            $val->close();
            $conn->close();
            
            
        }


        public function getMoneyFromUser($id){

            $query = "SELECT*FROM USERS WHERE ID_USUARIO=?";

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



    }




?>