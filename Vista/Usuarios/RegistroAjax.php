<?php
	header('Content-type: application/json');
	require_once 'config.php';
	$response = array();
	// Verificacion del envio del formulario via AJAX
	if ($_POST) {
		
		$email = trim($_POST['email']);
		$pass = trim($_POST['cpassword']);
		$rol_usu = trim($_POST['rol_usu']);		
		$personal_usu = trim($_POST['personal_usu']);

		$user_email 	= strip_tags($email);
		$user_pass 		= strip_tags($pass);
		$user_rol 		= strip_tags($rol_usu);
		$user_personal	= strip_tags($personal_usu);

		// sha256 password hashingqs
		$hashed_password = hash('sha256', $user_pass);
		// Consulta para insertar los registros a la base de datos 
		$query  = "INSERT INTO usuarios(correo_usu, password_usu, rol_usu, estado_usu, id_personal) VALUES( :email, :pass, :rol, '1', :personal)";
		//$query2 = "UPDATE `personal` SET `estado_per` = '2' WHERE `personal`.`id_per` = $user_personal";
		$stmt = $DBcon->prepare( $query );

		//$stmt->bindParam(':name', $full_name);
		$stmt->bindParam(':email', $user_email);
		$stmt->bindParam(':pass',	  $hashed_password);
		$stmt->bindParam(':rol', 	  $user_rol);
		$stmt->bindParam(':personal', $user_personal);

		
		// Verifica el registro exitoso
        if ( $stmt->execute() ) {
			$response['status'] = 'success';
			$response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; Usted se ha registrado con éxito, puede iniciar sesión ahora';
				
        } else {
            $response['status'] = 'error'; // No pudo registrarse
			$response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No se pudo registrar, intente de nuevo más tarde';
        }	
	}
	
	echo json_encode($response);