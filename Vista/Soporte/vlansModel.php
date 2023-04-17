<?php
include("../Inventario/Conexion2.php");
// CONEXIÓN CON LA BASE DE DATOS
$objeto   = new Conexion();
$conexion = $objeto->Conectar();

//OBTENCIÓN DE LOS DATOS DEL FORMULARIO DE ACTUALIZACIÓN A TRAVÉS DEL MÉTODO POST
$vlan    = (isset($_POST['vlan'])) ? $_POST['vlan'] : '';
$opcion  = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$vlan_id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1:
        $consulta  = "INSERT INTO vlan (vlan,estado_vlan) VALUES('$vlan','1') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();             
        break;
    case 2:        
        $consulta  = "UPDATE vlan SET vlan='$vlan' WHERE id_vlan='$vlan_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        break;  
    case 3:        
        $consulta  = "UPDATE vlan SET estado_vlan='0' WHERE id_vlan='$vlan_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                             
        break;
}


//print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
