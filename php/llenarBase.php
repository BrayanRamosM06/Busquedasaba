<?php
//en este scrip pretendemos llenar una base de datos con un excel
include ('dataBase.php');

$patch = file('../sabacodigos.csv');

mysqli_set_charset($db,"utf8");


foreach ($patch as $lineass) {
    $lineas = explode(";", $lineass);
    
    $sku = ($lineas[0]);
    $sap = ($lineas[1]);
    $descripcion = ($lineas[2]);
    $barra   = ($lineas[3]);

    $sql= "SELECT *FROM codigosaba  WHERE sku=?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt,'s', $sku);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if(mysqli_num_rows($result) >0){
        
        
        $stmt =mysqli_prepare($db,"UPDATE  codigosaba SET sku = ?, sap = ? ,descripcion = ? ,barra = ?  WHERE sku = $sku");
        mysqli_stmt_bind_param($stmt,'ssss', $sku, $sap, $descripcion, $barra);
        mysqli_stmt_execute($stmt);
        $stmt->close();
        // $stmt = $db-> mysqli_prepare($update);
        
    }else{
        
        $query ="INSERT INTO codigosaba (sku, sap, descripcion, barra) VALUES (?,?,?,?) ";
        $stmt = mysqli_prepare($db,$query);
        mysqli_stmt_bind_param($stmt, 'ssss', $sku,$sap, $descripcion, $barra);
        mysqli_stmt_execute($stmt);

        if (mysqli_query($db,$query)) {
            echo("Registrado correctamente");    
            
        }else{
            echo "Error al insertar". $insert."<br>". mysqli_error($db);
        }
    }    
  
}
mysqli_close($db);

?>