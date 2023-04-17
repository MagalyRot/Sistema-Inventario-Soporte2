<?php
include 'Conexion2.php';
$objeto    = new Conexion();
$conexion  = $objeto->Conectar();
$opcion    = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$asig_id   = (isset($_POST['id'])) ? $_POST['id'] : '';

date_default_timezone_set('America/Mexico_City');
$fechaActual = date("Y-m-d H:i:s");

switch($opcion){
    // CASO PARA FINALIZAR UN PRÉSTAMO PERMANENTE Y TEMPORAL,CAMBIA A ESTADO ACTIVO LOS EQUIPO Y ARTICULOS PERTENECIENTES
    case 1:
        $consulta  = "UPDATE asignaciones SET estado_asig='2'  WHERE id_asig='$asig_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        $consulta  = "UPDATE asignaciones SET fechaFin='$fechaActual'  WHERE id_asig='$asig_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        $consulta  = "UPDATE articulos JOIN detalleasig_art on detalleasig_art.id_art=articulos.id_art and detalleasig_art.id_asig='$asig_id' set articulos.estado_art='1' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $consulta  = "UPDATE equipos_c join detalleasig_equipo on detalleasig_equipo.id_eqc=equipos_c.id_eqc and detalleasig_equipo.id_asig='$asig_id' set equipos_c.estado_eqc='1';";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break; 
    // CASO PARA CANCELAR UN PRÉSTAMO PERMANENTE Y TEMPORAL, CAMBIA A ESTADO ACTIVO LOS EQUIPOS Y ARTÍCULOS PRETENECIENTES   
    case 2:           
        $consulta  = "UPDATE asignaciones SET estado_asig='3'  WHERE id_asig='$asig_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  
        $consulta  = "UPDATE articulos JOIN detalleasig_art on detalleasig_art.id_art=articulos.id_art and detalleasig_art.id_asig='$asig_id' set articulos.estado_art='1' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $consulta  = "UPDATE equipos_c join detalleasig_equipo on detalleasig_equipo.id_eqc=equipos_c.id_eqc and detalleasig_equipo.id_asig='$asig_id' set equipos_c.estado_eqc='1';";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();       
        break;

   
}

//print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;