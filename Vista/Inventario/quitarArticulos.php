<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

session_start();
array_splice($_SESSION["carritoArticulos"], $indice, 1);
header("Location: ./prestamos1.php?status1=3");
?>