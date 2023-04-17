<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


include_once "../Vista/Inventario/bd.php";
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGJIJKLMNOPQRSTUVWXYZ';
$pass = substr(str_shuffle($permitted_chars), 0, 10);
$passNueva = hash('sha256', $pass);

$sentenciaActualizarContra=$base_de_datos->query("UPDATE usuarios SET password_usu = '$passNueva' WHERE correo_usu = '$correo'");
$sentenciaActualizarContra->fetchAll(PDO::FETCH_OBJ);

$sentencia = $base_de_datos->query("SELECT correo_usu FROM usuarios WHERE correo_usu ='$correo'");
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
    $mail->addAddress($datoUS->correo_usu);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reenvio de datos de usuario para el sistema';
    $mail->Body    = 'Tu datos para el incio de sesión en el sistema son: <br><br>
                    Usuario: '.$datoUS->correo_usu.' <br><br>
                    Contraseña: '.$pass.'';
    $mail->send();
    echo "Enviado";

}

/*$sentencia = $base_de_datos->query("SELECT correo_usu, password_usu FROM usuarios WHERE correo_usu ='$correo'");
$equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);

    foreach ($equipos as $equipo) {

        $mail = new PHPMailer(true);
        //Server settings

        $mail->$isSMTP();
        $mail->Host = "smtp.office365.com"; // servidor smtp
        $mail->SMTPAuth = true;
        $mail->Username ='helpdesk.dsyt@urse.edu.mx'; //nombre usuario
        $mail->Password = '515t3m45**'; //contraseña
        $mail->SMTPSecure = 'tls'; //seguridad
        $mail->Port = 587; //puerto


        //Recipients
        $mail->setFrom('helpdesk.dsyt@urse.edu.mx', 'helpdesk DSYT');
        $mail->addAddress('dsyt.ss1@urse.edu.mx');     //Add a recipient
    //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Datos para ingresar';
        $mail->Body    = 'Tu datos para el incio de sesión en el sistema son: <br><br>
                        Usuario: '.$equipo->correo_usu.' <br><br>
                        Contraseña: '.$equipo->password_usu.' <br><br>';
        $mail->send();

}*/
