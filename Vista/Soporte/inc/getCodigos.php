<?php

require 'database.php';

$con = new Database();
$pdo = $con->conectar();

$campo = $_POST["campo"];

$sql = "SELECT * FROM vista_padministrativos WHERE nombre_per LIKE ? OR ntrabajador_per LIKE ? ORDER BY nombre_per ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->execute([$campo . '%', $campo . '%']);

$html = "";

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$html .= "<li onclick=\"mostrar('" . $row["id_per"] . "','" . $row["ntrabajador_per"] . "','" . $row["nombre_per"] . "','" . $row["apellidoP_per"] . "', '" . $row["tipo_per"] . "','" . $row["area_are"] . "')\">" . $row["ntrabajador_per"] . " - " . $row["nombre_per"] . " " . $row["apellidoP_per"] . " " . $row["apellidoM_per"] . " </li>";
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
