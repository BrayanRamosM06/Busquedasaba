<?php
//en este scrip pretendemos llenar una base de datos con un excel
include ('dataBase.php');

$patch = file('../sabacodigos.csv');


foreach ($patch as $lineass) {
    $lineas = explode(";", $lineass);
    
    $sku = ($lineas[0]);
    $sap = ($lineas[1]);
    $descripcion = ($lineas[2]);
    $barra   = ($lineas[3]);

    $Existe = "SELECT *FROM codigosaba  WHERE sku='$sku'";
    $verificar = mysqli_query($db,$Existe);
   

    $existeCount = mysqli_num_rows($verificar);



  
}
$db->close();  




?>