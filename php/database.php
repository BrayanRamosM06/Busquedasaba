<?php
    $server ="localhost";
    $username ="root";
    $password ="";
    $database ="dataopls";

    //$db = new mysqli($server, $username, $password, $database);

    //if ($db->connect_error) {
     //   die("Erro en la conexion revisa tu código" .$db->connect_error);
        # code...
   // }
        try {
            //code...
            $db = new PDO('mysql:host=localhost;dbname = dataopls ', $username, $password);
            if ($db){
                //echo ("Conexion exitosa");
            }else{
                echo ("no se pudo establecer la conexión ");
            }
            
        } catch (PDOException $e) {
            echo ("no se pudo establecer la conexion con la base");
        }
?>