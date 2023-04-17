<?php
// Incluimos el fichero de conexion a la base de datos
require_once 'config.php';
// Condicional para revisar el correo electronico
if ( isset($_REQUEST['email']) && !empty($_REQUEST['email']) ) {
		
		$email = trim($_REQUEST['email']);
		$email = strip_tags($email);
		// Consulta para verificar la existencia del correo
		$query = "SELECT correo_usu FROM usuarios WHERE correo_usu=:email";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':email'=>$email));
		
		if ($stmt->rowCount() == 1) {
		//Si el correo electrónico ya existe muestra false
			echo 'false'; 
		} else {
			echo 'true'; 
		}
}