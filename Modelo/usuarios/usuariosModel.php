<?php
include '../../Controlador/ConexionD.php';
$objeto = new Conexion();
$conexion          = $objeto->Conectar();
$addnombre_ad      = (isset($_POST['addnombre_ad'])) ? $_POST['addnombre_ad'] : '';
$addapellidoP_ad   = (isset($_POST['addapellidoP_ad'])) ? $_POST['addapellidoP_ad'] : '';
$addapellidoM_ad   = (isset($_POST['addapellidoM_ad'])) ? $_POST['addapellidoM_ad'] : '';
$addnTrabajador_ad = (isset($_POST['addnTrabajador_ad'])) ? $_POST['addnTrabajador_ad'] : '';
$addarea_ad        = (isset($_POST['addarea_ad'])) ? $_POST['addarea_ad'] : '';

$opcion            = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$cat_id            = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1:
        $consulta  = "INSERT INTO personal (`nombre_per`, `apellidoP_per`,`apellidoM_per`,`ntrabajador_per`,`tipo_per`,`area_per`,`estado_per`)
                      VALUES('$addnombre_ad','$addapellidoP_ad','$addapellidoM_ad','$addnTrabajador_ad','Administrativo','$addarea_ad','1') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        break;    
    case 2:           
        $consulta  = "UPDATE categorias SET nombre_cat='$categoria'  WHERE id_cat='$cat_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        break;
    case 3:        
        $consulta  = "UPDATE personal SET estado='0' WHERE id_per='$cat_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;

   
}

//print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;