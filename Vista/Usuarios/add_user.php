<?php 
include('../../Controlador/conect.php');
$addnombre_ad = $_POST['addnombre_ad'];
$addapellidoP_ad = $_POST['addapellidoP_ad'];
$addapellidoM_ad = $_POST['addapellidoM_ad'];
$addnTrabajador_ad = $_POST['addnTrabajador_ad'];
$addarea_ad = $_POST['addarea_ad'];
$addTipo_ad = $_POST['addTipo_ad'];

//$sql = "INSERT INTO `users` (`username`,`email`,`mobile`,`city`) values ('$username', '$email', '$mobile', '$city' )";

$sql= "INSERT INTO personal (`nombre_per`, `apellidoP_per`,`apellidoM_per`,`ntrabajador_per`,`tipo_per`,`area_per`,`estado_per`)
                      VALUES('$addnombre_ad','$addapellidoP_ad','$addapellidoM_ad','$addnTrabajador_ad','$addTipo_ad','$addarea_ad','1') ";	

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