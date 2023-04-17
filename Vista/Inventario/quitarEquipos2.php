<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

session_start();
array_splice($_SESSION["carritoEquipos2"], $indice, 1);
header("Location: ./prestamos1.php?status3=3");
?>