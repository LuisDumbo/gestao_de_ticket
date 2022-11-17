<?php
namespace App\Db;

use PDO ;
use PDOException ;

class  conection{

    public static function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=tarefas_admin", $username, $password);
           
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      

            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

   

}