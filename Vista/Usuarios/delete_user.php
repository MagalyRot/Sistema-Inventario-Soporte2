<?php 
include('../../Controlador/conect.php');

$user_id = $_POST['id'];
//$sql = "DELETE FROM personal WHERE id_per='$user_id'";
$sql = "UPDATE `personal` SET `estado_per` = '0' WHERE `personal`.`id_per` = '$user_id'";
$delQuery =mysqli_query($con,$sql);
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