<?php 
include('../../Controlador/conect.php');
$user_id = $_POST['id'];

// $personal= "select u.id_personal as id_per, u.id_usu as id_usu, u.correo_usu as correo_usu
//     FROM usuarios as u, personal as p
//     where '$user_id' = p.id_per";

//consulta para cambiar de status a inactivo de usuarios (correo)
$sql = "UPDATE `usuarios` SET `estado_usu` = '0' WHERE `usuarios`.`id_usu` = '$user_id'";

//consulta para cambiar de status a inactivo de personal
// $sql2 = "UPDATE `personal` SET `estado_per` = '0' WHERE `personal`.`id_per` = '$personal'";

$delQuery =mysqli_query($con,$sql);
// $delQuery2 =mysqli_query($con,$sql2);

if($delQuery==true) 
{
	 $data = array(
        'status'=>'success',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
      
    );

    echo json_encode($data);
} 

?>