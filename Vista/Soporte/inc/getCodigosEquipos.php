<?php

require 'database.php';

$con = new Database();
$pdo = $con->conectar();

$campo = $_POST["campoeqc"];

$sql = "SELECT * from vista_listaequiposactivos WHERE id_eqc LIKE ? OR folio_eqc LIKE ? ORDER BY id_eqc ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->execute([$campo . '%', $campo . '%']);

$html = "";

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$html .= "<li onclick=\"mostrareqc('" . $row["id_eqc"] . "','" . $row["folio_eqc"] . "')\">" . $row["id_eqc"] . " - " . $row["folio_eqc"] . " </li>";
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
