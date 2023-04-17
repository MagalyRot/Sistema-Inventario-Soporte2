<?php
// Definimos la conexion con el servidor de Base de Datos
define('HostBD', 'localhost');
define('UsuarioBD', 'root');
define('PassBD', '');
define('NombreBD', 'sistema_urse');
// Para la conexión usaremos PDO
try {
	$DBcon = new PDO("mysql:host=".HostBD.";dbname=".NombreBD,UsuarioBD,PassBD);
	} catch(PDOException $conexion){
	die($conexion->getMessage());
	}