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

    $Existe = $db->query("SELECT *FROM codigosaba  WHERE sku='$sku'");


    if ($Existe->){
        $update = $db->prepare("UPDATE  codigosaba SET sku = ?, sap = ? ,descripcion =? ,barra =?  WHERE sku = '$sku'");
        $update->bindParam(1, $sku);
        $update->bindParam(2, $sap);
        $update->bindParam(3, $descripcion);
        $update->bindParam(4, $barra);
        $update->execute();
        echo ("Registro actulizado corretamente");
        echo "<br>";

    }else{
        $insert = $db->prepare("INSERT INTO codigosaba (sku, sap, descripcion, barra) VALUES (?,?,?,?) ");
        $insert->bindParam(1,$sku);
        $insert->bindParam(2,$sap);
        $insert->bindParam(3,$descripcion);
        $insert->bindParam(4,$barra);
        $insert->execute();

            echo("registro insertado correctamente");
            echo "<br>";

    }
  
}




?>