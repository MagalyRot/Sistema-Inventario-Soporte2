<?php
$conexion=mysqli_connect("localhost","root","","sistema_urse");
//poder manipular acentos y la ñ
$conexion->set_charset("utf8");
if($_POST["correo"] != "" && $_POST["password"] != ""){
   $correo  = $_POST["correo"];
   $password = $_POST["password"];
   $consulta="select rol.nombre_rol as rol,per.nombre_per as nombre,per.apellidoP_aper as apellidoP,per.apellidoM_per as apellidoM from usuarios as us, roles as rol, personal as per where per.id_per=us.id_personal and  rol.id_rol=us.rol_usu and correo_usu='".$correo."' and password_usu='".$password."'";
   $log=mysqli_query($conexion,$consulta);
   if($log->num_rows >0){

      while($row=mysqli_fetch_array($log)){
          @session_start();
          $_SESSION["name"]=$row["nombre"];
          $_SESSION["app"] =$row["apellidoP"];
          $_SESSION["apm"] =$row['apellidoM'];
          $_SESSION["rol"] =$row['rol'];
      }
      switch($_SESSION["rol"]){ 
          case 'Administrador':
            //super administrador
            echo "<script type=\"text/javascript\">
            alert(\"Bienvenido al sistema\"); 
            </script>";
            echo "<script type=\"text/javascript\">
            window.location='../vista/home.php';
            </script>";
          break;
      }
 } else{
echo "<script type=\"text/javascript\">
    alert(\"Usuario o contraseña incorrecta\"); 
    </script>";

    echo "<script type=\"text/javascript\">

    window.location='../Vista/login.php';
    </script>";
   }
}else{

    echo "<script type=\"text/javascript\">
    alert(\"Rellena el formulario\"); 
    </script>";


    echo "<script type=\"text/javascript\">

    window.location='../Vista/login.php';
    </script>";
}
?>