<?php 
include('../../Controlador/conect.php');

        //CONSULTA PARA OBTENER EL ULTIMO ID
        $conect    = mysqli_connect("localhost","root","","sistema_urse");
        $conect->set_charset("utf8");
        $qry_num   = "SELECT MAX(id_mant) AS ultimo FROM mantenimiento";
        $resultado = mysqli_query($conect, $qry_num);
        $row       = mysqli_fetch_assoc($resultado);
        $ultimo    = $row["ultimo"];
        mysqli_free_result($resultado);

        //CONSULTA PARA OBTENER AL ADMINISTRADOR QUE ES MAGDIEL
        $conect    = mysqli_connect("localhost","root","","sistema_urse");
        $conect->set_charset("utf8");
        $qry_encargado   = "SELECT p.id_per as encargado, P.ntrabajador_per as nt, p.nombre_per as nombre, p.apellidoP_per as ap, p.apellidoM_per as am
                                FROM personal as p, areas as a, tipo_personal as tp
                                WHERE p.area_per= a.id_are
                                and a.area_are = 'SyT'
                                and p.tipo_per=tp.id_tipoper 
                                and p.tipo_per=1
                                and p.estado_per=1";

        $resultadoEN   = mysqli_query($conect, $qry_encargado);
        $row         = mysqli_fetch_assoc($resultadoEN);
        $encargado   = $row["nt"];
        
        mysqli_free_result($resultadoEN);

        //UTILIZAR EL ID PARA AGREGARLE EL INICIO DEL FOLIO
        $suma      = $ultimo+1;
        $inicio    = "URSEM-000";
        
        $folio        = $inicio.$suma;
        $tipo_mant    = $_POST['tipo_mant'];
        $fecha_mant   = $_POST['fecha_mant'];
        $observa_mant = $_POST['observa_mant'];
        $equipo_mant  = $_POST['equipo_mant'];
        $solicitante  = $_POST['solicitante'];
        
$sql= "INSERT INTO mantenimiento (`folio_mant`, `tipo_mant`,`fecha_mant`,`observaciones_mant`,`equipo_mant`,`solicitante`,`encargado`,`estado_mant`)
                      VALUES('$folio','$tipo_mant','$fecha_mant','$observa_mant','$equipo_mant','$solicitante','$encargado','1') ";	

$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
    $data = array(
        'status'=>'true',      
    );
    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
    );

    echo json_encode($data);
} 

?>