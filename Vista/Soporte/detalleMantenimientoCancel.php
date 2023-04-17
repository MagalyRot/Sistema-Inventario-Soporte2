<?php 
include('../../Controlador/conect.php');
$cancelid = $_POST['cancelid'];
$cancelid2 = $_POST['cancelid'];
$cancelTecnico = $_POST['cancelTecnico'];
$cancelObservaciones = $_POST['cancelObservaciones'];
$cancelFecha = $_POST['cancelFecha'];


//$sql = "INSERT INTO `users` (`username`,`email`,`mobile`,`city`) values ('$username', '$email', '$mobile', '$city' )";

$sql= "INSERT INTO detalle_mantenimiento (`id_mant`, `id_personal`,`finaliza`,`observacionesF`,`estado_dm`)
                      VALUES('$cancelid','$cancelTecnico','$cancelFecha','$cancelObservaciones','3') ";	

$sql2 = "UPDATE `mantenimiento` SET `estado_mant` = '3' WHERE `mantenimiento`.`id_mant` = '$cancelid2'";

$query= mysqli_query($con,$sql);
$query2= mysqli_query($con,$sql2);

$lastId = mysqli_insert_id($con);

if($query == true && $query2 == true)
    { $data = array('status'=>'true',);
        echo json_encode($data);
    }
else
    {$data = array('status'=>'false',);
        echo json_encode($data);
    }  

?>