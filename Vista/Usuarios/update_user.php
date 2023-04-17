<?php 
include('../../Controlador/conect.php');
$edtnombre = $_POST['edtnombre'];
$edtapellidoP = $_POST['edtapellidoP']; 
$edtapellidoM = $_POST['edtapellidoM'];
$edtnTrabajador = $_POST['edtnTrabajador'];
$edtarea = $_POST['edtarea'];
$edttipo = $_POST['edttipo'];
$edtestado = $_POST['edtestado'];
$id = $_POST['id'];

$sql = "UPDATE `personal` SET  `nombre_per`='$edtnombre' , `apellidoP_per`= '$edtapellidoP', `apellidoM_per`='$edtapellidoM',  `ntrabajador_per`='$edtnTrabajador', `tipo_per`='$edttipo', `area_per`='$edtarea', `estado_per`='$edtestado' WHERE id_per='$id' ";
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