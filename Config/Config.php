<?php

class dbConnection {


    public function mysqlDBConnection(){

        $connection = new mysqli('<server name>','<user>','<pass>','<dbname>');
        mysqli_set_charset($connection,'utf8');

        return $connection;
    }


}



?>
