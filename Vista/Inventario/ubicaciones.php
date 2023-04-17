<?php

require 'base.php';

$con = new Database();
$pdo = $con->conectar();

$ubicacion = $_POST["ubicacion"];

$sql = "SELECT * FROM ubicaciones WHERE edificio_ubi LIKE ? OR piso_ubi LIKE ? OR aula_ubi LIKE ? ORDER BY id_ubi ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->execute([$ubicacion . '%', $ubicacion . '%', $ubicacion . '%']);

$html = "";

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$html .= "<li onclick=\"mostrar('" . $row["id_ubi"] . "')\">" . $row["edificio_ubi"] . " - " . $row["piso_ubi"] . " - " . $row["aula_ubi"] . "</li>";
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
