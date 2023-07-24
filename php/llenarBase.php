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

 
    if($existeCount > 0){
        echo($existeCount);
        echo "<br>";
        $updata = "UPDATE  codigosaba SET sku = '$sku', sap = '$sap',descripcion = '$descripcion',barra = '$barra' WHERE sku = '$sku'";
         echo ($sku);
         echo "<br>";
         mysqli_query($db, $updata);

    }else{  
        echo($existeCount);
        echo "<br>";
        echo ($sku);
        echo "<br>";
        $insert = "INSERT INTO  codigosaba (sku,sap,descripcion,barra) VALUES ('$sku','$sap','$descripcion','$barra')";
      
        if (mysqli_query($db,$insert)) {
            echo("Registrado correctamente");    
            
        }else{
            echo "Error al insertar". $insert."<br>". mysqli_error($db);
        }
    }

  
}
$db->close();  




?>