<?php
//en este scrip pretendemos llenar una base de datos con un excel
include ('dataBase.php');

$patch = file('../busqueda1.csv');


foreach ($patch as $lineass) {
    $lineas = explode(";", $lineass);
    
    $sku = ($lineas[0]);
    $sap = ($lineas[1]);
    $descripcion = ($lineas[2]);
    $barra   = ($lineas[3]);

    $Existe = "SELECT *FROM codigosopls WHERE sku='$sku'";
    $verificar = mysqli_query($db,$Existe);
   

    $existeCount = mysqli_num_rows($verificar);

 
    if($existeCount = 1){
        
        $updata = "UPDATE codigosopls SET sku = '$sku', sap = '$sap',descripcion = '$descripcion',barra = '$barra' WHERE sku = '$sku'";
         
         mysqli_query($db, $updata);

    }else{  
        echo($existeCount);
        $insert = "INSERT INTO codigosopls (sku,sap,descripcion,barra) VALUES ('$sku','$sap','$descripcion','$barra')";
        mysqli_query($db,$insert);
    }

    
}




?>