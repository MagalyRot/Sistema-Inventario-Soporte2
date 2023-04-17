<?php
if(!isset($_POST["software2"])) exit;
if(!isset($_POST["ip2"])) exit;
if(!isset($_POST["id_rutaRed2"])) exit;
include_once "bd.php";

$software=$_POST["software2"];
$ip=$_POST["ip2"];
$ruta=$_POST["id_rutaRed2"];
//Cconsulta para insertar datos a la tabla de equipos_c
$sentencia = $base_de_datos->prepare("INSERT INTO equipos_c(folio_eqc,ip_eqc,rutaRed_eqc,estado_eqc,descripcion_eqc) VALUES (?,?,?,?,?);");
$sentencia->execute(["",$ip,$ruta,1,$software]);
//Consulta para obtener el id del ultimo registro de equipo realizado
$sentencia = $base_de_datos->prepare("SELECT id_eqc FROM equipos_c ORDER BY id_eqc DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
//asignar id de asignacion a variable
$idEquipo = $resultado === false ? 1 : $resultado->id_eqc;
//agregar folio del equipo
$folio="URSEEQC0".$idEquipo;
$sentencia = $base_de_datos->prepare("UPDATE equipos_c SET folio_eqc = ? WHERE id_eqc = ?;");
$sentencia->execute([$folio, $idEquipo]);

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO detalle_equipos(id_eqc, id_art) VALUES (?, ?);");
$sentenciaEstado = $base_de_datos->prepare("UPDATE articulos SET estado_art = 2 WHERE id_art = ?;");

if(!empty($_POST["componentes2"]) && is_array($_POST["componentes2"])){
    foreach($_POST["componentes2"] as $componentes){
        $sentencia->execute([$idEquipo,$componentes]);
        $sentenciaEstado->execute([$componentes]);
    }
}

$base_de_datos->commit();
header("Location: ./equipoCompu.php");


























include 'Conexion2.php';
// CONEXIÓN CON LA BASE DE DATOS
$objeto   = new Conexion();
$conexion = $objeto->Conectar();
//OBTENCIÓN DE LOS DATOS DEL FORMULARIO DE ACTUALIZACIÓN A TRAVÉS DEL MÉTODO POST
$id_cpu      = (isset($_POST['id_cpu'])) ? $_POST['id_cpu'] : '';
$id_teclado  = (isset($_POST['id_teclado'])) ? $_POST['id_teclado'] : '';
$id_mouse     = (isset($_POST['id_mouse'])) ? $_POST['id_mouse'] : '';
$monitor      = (isset($_POST['id_monitor'])) ? $_POST['id_monitor'] : '';
$id_procesador  = (isset($_POST['id_procesador'])) ? $_POST['id_procesador'] : '';
$id_almacenamiento   = (isset($_POST['id_almacenamiento'])) ? $_POST['id_almacenamiento'] : '';
$id_ram   = (isset($_POST['id_ram'])) ? $_POST['id_ram'] : '';
$software = (isset($_POST['software'])) ? $_POST['software'] : '';
$ip      = (isset($_POST['ip'])) ? $_POST['ip'] : '';

$opcion      = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$art_id      = (isset($_POST['id'])) ? $_POST['id'] : '';

//llenar arreglo de id's
print_r($id_teclado);
print_r($id_teclado."pruebaa");
$arrayValores = array();
array_push($arrayValores, ${$id_cpu});
array_push($arrayValores, ${$id_teclado});
print_r($arrayValores);

switch($opcion){
    case 1:
    //    $consulta  = "INSERT INTO articulos (folio_art, nombre_art, modelo_art, marca_art, descripcion_art, numPoliza_art,proveedor_art,categoria,estado_art) VALUES('$folio1', '$nombre1', '$modelo1', '$marca1', '$descripcion1', '$num_poliza1',  '$proveedor1','$categoria1', '1') ";			
     //   $resultado = $conexion->prepare($consulta);
      //  $resultado->execute();             
        break;
 
}
//print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;