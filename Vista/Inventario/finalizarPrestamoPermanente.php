<?php
if(!isset($_POST["idTrabajador2"])) exit;
if(!isset($_POST["id_ubicacion2"])) exit;
session_start();


$admin = $_POST["idTrabajador2"];
$destino = $_POST["id_ubicacion2"];
date_default_timezone_set('America/Mexico_City');
$fechaActual = date("Y-m-d H:i:s");
include_once "bd.php";

//Cconsulta para insertar datos a la tabla de asignaciones
$sentencia = $base_de_datos->prepare("INSERT INTO asignaciones(folio_asig,fecha_asig,fecha_dev,tipo,ubicacion,estado_asig) VALUES (?, ?,?,?,?,?);");
$sentencia->execute(["",$fechaActual,"","Permanente",$destino,1]);
//Consulta para obtener el id de la ultima asignación realizada
$sentencia = $base_de_datos->prepare("SELECT id_asig FROM asignaciones ORDER BY id_asig DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
//asignar id de asignacion a variable
$idAsignacion = $resultado === false ? 1 : $resultado->id_asig;
//Consulta para agregar administrativo a tabla detalle asignacion
$sentencia = $base_de_datos->prepare("INSERT INTO detalleasig_per(id_asig, id_personal) VALUES (?, ?);");
$sentencia->execute([$idAsignacion, $admin]);
//Consulta para asignar el folio de la asignación
$folio="URSEAP0".$idAsignacion;
$sentencia = $base_de_datos->prepare("UPDATE asignaciones SET folio_asig = ? WHERE id_asig = ?;");
$sentencia->execute([$folio, $idAsignacion]);

//Consulta para agregar a encargado a tabla detalle asignacion
$sentencia = $base_de_datos->prepare("INSERT INTO detalleasig_per(id_asig, id_personal) VALUES (?, ?);");
$sentencia->execute([$idAsignacion,7]);

//Consulta para agregar al responsable a tabla detalle asignacion
$sentencia = $base_de_datos->prepare("INSERT INTO detalleasig_per(id_asig, id_personal) VALUES (?, ?);");
$sentencia->execute([$idAsignacion,6]);

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO detalleasig_art(id_asig, id_art) VALUES (?, ?);");
$sentenciaEstado = $base_de_datos->prepare("UPDATE articulos SET estado_art = 2 WHERE id_art = ?;");
foreach ($_SESSION["carritoArticulos2"] as $articulo) {
	//$total += $producto->total;
	$sentencia->execute([$idAsignacion,$articulo->id_art]);
	$sentenciaEstado->execute([$articulo->id_art]);
}

$sentencia = $base_de_datos->prepare("INSERT INTO detalleasig_equipo(id_eqc, id_asig) VALUES (?, ?);");
$sentenciaEstado2 = $base_de_datos->prepare("UPDATE equipos_c SET estado_eqc = 2 WHERE id_eqc = ?;");
foreach ($_SESSION["carritoEquipos2"] as $equipo) {
	//$total += $producto->total;
	$sentencia->execute([$equipo->id_eqc,$idAsignacion]);
	$sentenciaEstado2->execute([$equipo->id_eqc]);
}

$base_de_datos->commit();
unset($_SESSION["carritoArticulos2"]);
$_SESSION["carritoArticulos2"] = [];
unset($_SESSION["carritoEquipos2"]);
$_SESSION["carritoEquipos2"] = [];
header("Location: ./prestamos1.php");
?>