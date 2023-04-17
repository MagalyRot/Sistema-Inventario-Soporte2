<?php


include 'Conexion2.php';
// CONEXIÓN CON LA BASE DE DATOS
$objeto   = new Conexion();
$conexion = $objeto->Conectar();
$id      = (isset($_POST['id_per'])) ? $_POST['id_per'] : '';

$consulta = "SELECT * FROM personal WHERE id_per=$id";
$resultado = $conexion->prepare($consulta);
$resultado->execute();        
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;

/*

*/
?>