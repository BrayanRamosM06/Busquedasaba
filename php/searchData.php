<?php
    
    require_once('database.php');
    //include('database.php');



    $search_criterial = $_POST['busqueda'];
    //$search_criterial = 7;


    $query = "SELECT sku, sap, descripcion, barra FROM codigosaba WHERe sku 
    like '%$search_criterial%' OR
    sap LIKE '%$search_criterial%' OR
    descripcion LIKE '%$search_criterial%' OR
    barra LIKE '%$search_criterial%' ORDER BY sku asc
    ";

    $codigos = [];


    $error = ['data' => false];

    $getCodigos = $db->query($query);



    if($getCodigos->num_rows >0){
        while ($data = $getCodigos->fetch_assoc()) {
            $codigos[] = $data;
        }
        
        echo json_encode($codigos);

    }else {
        echo json_encode($error);
    }



?>