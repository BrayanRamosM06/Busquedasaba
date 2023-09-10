<?php
    $server ="localhost";
    $username ="root";
    $password ="";
    $database ="dataopls";

    $db = new mysqli($server, $username, $password, $database);

    if ($db->connect_error) {
       die("Erro en la conexion revisa tu código" .$db->connect_error);
        # code...
   }

?>