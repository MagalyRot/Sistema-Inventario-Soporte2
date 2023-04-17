<?php
$conexion=mysqli_connect("localhost","root","","sistema_urse");
//poder manipular acentos y la ñ
$conexion->set_charset("utf8");
if($_POST["correo"] != "" && $_POST["password"] != ""){
    $correo  = $_POST["correo"];
    $password = $_POST["password"];
    // CONVERTIR LA CONTRASEÑA CON HASH
    $hashed_password = hash('sha256', $password);
    
   $consulta="SELECT per.id_per as idPersonal,per.nombre_per as nombre,per.apellidoP_per as apellidoP, per.apellidoM_per as apellidoM, per.ntrabajador_per as ntrabajador, t.tipo_per as tipo, 
                    us.correo_usu as correo, us.estado_usu as estadoUsuario, 
                    rol.nombre_rol as rol, 
                    ar.area_are as area
                FROM usuarios as us, 
                    roles as rol, 
                    personal as per, 
                    areas as ar,
                    tipo_personal as t
                WHERE per.id_per=us.id_personal 
                    and rol.id_rol=us.rol_usu
                    and per.area_per = ar.id_are
                    and us.estado_usu = '1'
                    and correo_usu='".$correo."'
                    and password_usu='".$hashed_password."'";
    $log=mysqli_query($conexion,$consulta);
   if($log->num_rows >0){

    while($row=mysqli_fetch_array($log)){
        @session_start();
        $_SESSION["id"]           = $row["idPersonal"];
        $_SESSION["name"]         = $row["nombre"];
        $_SESSION["app"]          = $row["apellidoP"];
        $_SESSION["apm"]          = $row['apellidoM'];
        $_SESSION["ntrabajador"]  = $row["ntrabajador"];
        $_SESSION["tipo"]         = $row["tipo"];
        $_SESSION["area"]         = $row["area"];
        $_SESSION["correo"]       = $row['correo'];
        $_SESSION["estado"]       = $row['estadoUsuario'];
        $_SESSION["rol"]          = $row['rol'];
      }
      switch($_SESSION["rol"]){ 
        case 'Administrador':
            //SUPER ADMINISTRADOR
            echo "<script type=\"text/javascript\">
            alert(\"Bienvenido al sistema\"); 
            </script>";
            echo "<script type=\"text/javascript\">
            window.location='../Vista/home.php';
            </script>";
          break;
          case 'Mantenimiento':
            //PERSONAL DE MANTENIMIENTO
            echo "<script type=\"text/javascript\">
            alert(\"Bienvenido al sistema\"); 

            </script>";
            echo "<script type=\"text/javascript\">
            window.location='../Vista/home.php';
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