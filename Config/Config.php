<?php

class dbConnection {


    public function mysqlDBConnection(){

        $connection = new mysqli('mysqlserver666.mysql.database.azure.com','leviathan','Demonioday98*','laravel_pt');
        mysqli_set_charset($connection,'utf8');

        return $connection;
    }


}



?>