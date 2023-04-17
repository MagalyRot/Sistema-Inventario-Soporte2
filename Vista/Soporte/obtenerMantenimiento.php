<?php include('../../Controlador/conect.php');
    $id = $_POST['id'];
    $sql = "SELECT * FROM mantenimiento WHERE id_mant='$id' LIMIT 1";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);
?> 
