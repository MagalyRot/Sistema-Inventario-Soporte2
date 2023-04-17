<?php 
include('../../Controlador/conect.php');
        //CONSULTA PARA OBTENER EL ULTIMO ID DE MANTENIMIENTO REGISTRADO
        $conect    = mysqli_connect("localhost","root","","sistema_urse");
        $conect->set_charset("utf8");
        $qry_num   = "SELECT MAX(id_mant) AS ultimo FROM mantenimiento";
        $resultado = mysqli_query($conect, $qry_num);
        $row       = mysqli_fetch_assoc($resultado);
        $ultimo    = $row["ultimo"];
        mysqli_free_result($resultado);

        //UTILIZAR EL ID PARA AGREGARLE EL INICIO DEL FOLIO
        $id_user    = $_POST['id_user'];
        $id_mant    = $ultimo;

$sql= "INSERT INTO detalle_mantenimiento (`id_mant`, `id_personal`,`finaliza`,`estado_dm`)
                      VALUES('$id_mant','$id_user','','1') ";	

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