<?php
include 'Conexion2.php';
// CONEXIÓN CON LA BASE DE DATOS
$objeto   = new Conexion();
$conexion = $objeto->Conectar();

//OBTENCIÓN DE LOS DATOS DEL FORMULARIO DE ACTUALIZACIÓN A TRAVÉS DEL MÉTODO POST
$nombre     = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$direccion  = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
$telefono   = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$email      = (isset($_POST['email'])) ? $_POST['email'] : '';
$nombre1     = (isset($_POST['nombre1'])) ? $_POST['nombre1'] : '';
$direccion1  = (isset($_POST['direccion1'])) ? $_POST['direccion1'] : '';
$telefono1   = (isset($_POST['telefono1'])) ? $_POST['telefono1'] : '';
$email1      = (isset($_POST['email1'])) ? $_POST['email1'] : '';
$opcion     = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$prov_id    = (isset($_POST['id'])) ? $_POST['id'] : '';
$estado=0;

switch($opcion){
    case 1:
        $consulta  = "INSERT INTO proveedores (empresa_prov, direccion_prov, telefono_prov, correo_prov,estado_prov) VALUES('$nombre1', '$direccion1', '$telefono1', '$email1', '1') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();             
        break;
    case 2:        
        $consulta  = "UPDATE proveedores SET empresa_prov='$nombre', direccion_prov='$direccion', telefono_prov='$telefono', correo_prov='$email' WHERE id_prov='$prov_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        break;  
    case 3:        
        $consulta  = "UPDATE proveedores SET estado_prov='0' WHERE id_prov='$prov_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                             
        break;
}


//print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
