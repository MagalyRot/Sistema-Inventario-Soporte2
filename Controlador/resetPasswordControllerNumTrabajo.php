<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


include_once "../Vista/Inventario/bd.php";
$numTrabajador = (isset($_POST['numTrabajador'])) ? $_POST['numTrabajador'] : '';

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGJIJKLMNOPQRSTUVWXYZ';
$pass = substr(str_shuffle($permitted_chars), 0, 10);
$passNueva = hash('sha256', $pass);

$sentenciaActualizarContra=$base_de_datos->query("UPDATE usuarios
INNER JOIN personal ON usuarios.id_personal = personal.id_per
SET usuarios.password_usu ='$passNueva'
WHERE personal.ntrabajador_per =$numTrabajador");
$sentenciaActualizarContra->fetchAll(PDO::FETCH_OBJ);

$sentencia = $base_de_datos->query("SELECT usuarios.correo_usu as correo FROM usuarios
INNER JOIN personal ON usuarios.id_personal = personal.id_per
WHERE personal.ntrabajador_per = $numTrabajador;");
$datosUsuario = $sentencia->fetchAll(PDO::FETCH_OBJ);

foreach ($datosUsuario as $datoUS) {


    $mail = new PHPMailer(true);
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dsyt.urse.oax@gmail.com';                     //SMTP username
    $mail->Password   = 'jzjskavggumodjqs';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('dsyt.urse.oax@gmail.com', 'helpdesk DSYT');
    $mail->addAddress($datoUS->correo);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reenvio de datos de usuario para el sistema';
    $mail->Body    = 'Tu datos para el incio de sesión en el sistema son: <br><br>
                    Usuario: '.$datoUS->correo.' <br><br>
                    Contraseña: '.$pass.'';
    $mail->send();
    echo "Enviado";

}

