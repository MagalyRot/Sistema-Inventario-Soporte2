<?php
include 'Conexion2.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$categoria = (isset($_POST['categoria'])) ? $_POST['categoria'] : '';
$categoria1 = (isset($_POST['categoria1'])) ? $_POST['categoria1'] : '';
$opcion    = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$cat_id    = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1:
        $consulta  = "INSERT INTO categorias (nombre_cat,estado) VALUES('$categoria1','1') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        break;    
    case 2:           
        $consulta  = "UPDATE categorias SET nombre_cat='$categoria'  WHERE id_cat='$cat_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        break;
    case 3:        
        $consulta  = "UPDATE categorias SET estado='0' WHERE id_cat='$cat_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;

   
}

//print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;