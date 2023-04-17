<?php

require 'base.php';

$con = new Database();
$pdo = $con->conectar();

$campo = $_POST["campo"];

$sql = "SELECT id_per, nombre_per FROM personal WHERE id_per LIKE ? OR nombre_per LIKE ? ORDER BY id_per ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->execute([$campo . '%', $campo . '%']);

$html = "";

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$html .= "<li onclick=\"mostrar('" . $row["id_per"] . "')\">" . $row["id_per"] . " - " . $row["nombre_per"] . "</li>";
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
