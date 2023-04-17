<?php 
include('../../Controlador/conect.php');
$finalid            = $_POST['finalid'];
$finalTecnico       = $_POST['finalTecnico'];
$finalObservaciones = $_POST['finalObservaciones'];
$finalFecha         = $_POST['finalFecha'];
$opcion             = $_POST['opcion1'];
// $opcion             = $_POST['opcion2'];


//CONSULTA PARA OBTENER EL ID DE EQUIPO DE CÓMPUTO PARA DARLO DE BAJA
        $conect    = mysqli_connect("localhost","root","","sistema_urse");
        $conect->set_charset("utf8");
        $qry_EQ   = "SELECT e.id_eqc as equipo
        FROM mantenimiento AS m, personal As p, equipos_c AS e, areas as a
            WHERE m.solicitante = p.id_per
                AND m.equipo_mant = e.id_eqc
                AND m.estado_mant = 1
                AND p.area_per = a.id_are
                AND m.id_mant = '$finalid'";

        $resultadoEQUIPO   = mysqli_query($conect, $qry_EQ);
        $row         = mysqli_fetch_assoc($resultadoEQUIPO);
        $equipo      = $row["equipo"];
        

if($opcion==1){

    //Consulta para finalizar el mantenimiento.
    $sql    = "INSERT INTO detalle_mantenimiento (`id_mant`, `id_personal`,`finaliza`,`observacionesF`,`estado_dm`)
            VALUES('$finalid','$finalTecnico','$finalFecha','$finalObservaciones','2') ";	
    
    // Consulta para cambiar el estado de mantenimiento a finalizado.
    $sql2   = "UPDATE `mantenimiento` SET `estado_mant` = '2' WHERE `mantenimiento`.`id_mant` = '$finalid'";

    // Consulta para pasar a estado desactivado el equipo de cómputo este en caso de que ya no funcione.    
    $sql3   = "UPDATE `equipos_c` SET `estado_eqc` = '0' WHERE `equipos_c`.`id_eqc` = '$equipo'";
   
    $sql4   = "UPDATE detalle_equipos AS DE, articulos AS A, equipos_c AS E
                SET A.estado_art = 1
                WHERE DE.id_art = A.id_art
                AND DE.id_eqc = E.id_eqc
                AND E.id_eqc = $equipo";

    //Consulta para eliminar los articulos agregados en DETALLE_EQUIPOS y que estan ligados al equipo de computo
    $sql5   = "DELETE FROM detalle_equipos WHERE id_eqc='$equipo'";
    
    $query  = mysqli_query($con,$sql);
    $query2 = mysqli_query($con,$sql2);
    $query3 = mysqli_query($con,$sql3);
    $query4 = mysqli_query($con,$sql4);
    $query5 = mysqli_query($con,$sql5);

    $lastId = mysqli_insert_id($con);
    
    if($query == true && $query2 == true && $query3 == true && $query4 == true && $query5 == true)
        { $data = array('status'=>'true',);
            echo json_encode($data);
        }
    else
        {$data = array('status'=>'false',);
            echo json_encode($data);
        } 
}else{
    //Consulta para finalizar el mantenimiento.
    $sqlF= "INSERT INTO detalle_mantenimiento (`id_mant`, `id_personal`,`finaliza`,`observacionesF`,`estado_dm`)
    VALUES('$finalid','$finalTecnico','$finalFecha','$finalObservaciones','2') ";	
    // Consulta para cambiar el estado de mantenimiento a finalizado.
    $sql2F = "UPDATE `mantenimiento` SET `estado_mant` = '2' WHERE `mantenimiento`.`id_mant` = '$finalid'";

    $queryMantNormal1  = mysqli_query($con,$sqlF);
    $queryMantNormal2 = mysqli_query($con,$sql2F);
    $lastId = mysqli_insert_id($con);

    if($queryMantNormal1 == true && $queryMantNormal2 == true )
        { $data = array('status'=>'true',);
            echo json_encode($data);
        }
    else
        {$data = array('status'=>'false',);
            echo json_encode($data);

    }
    }





?>