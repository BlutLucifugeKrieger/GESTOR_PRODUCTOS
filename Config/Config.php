<?php

class dbConnection {


    public function mysqlDBConnection(){

        $connection = new mysqli('localhost','root','Demonioday98*','php_sena');
        mysqli_set_charset($connection,'utf8');

        return $connection;
    }


}



?>
