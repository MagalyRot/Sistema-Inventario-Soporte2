<?php

include("../../Controlador/ConexionD2.php");
    
function obtener_todos_registros(){
    include("../../Controlador/Conexion.php");
    $stmt = $conexion->prepare("SELECT *FROM personal"); 
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}

    $query = '';    
    $salida = array();   
    $query = "SELECT * from personal ";
    $columns = array('ntrabajador_per','nombre_per','apellidoP_per','apellidoM_per', 'area_per');
 
    if(isset($_POST["search"]["value"])){
        $query .= 'where nombre_per LIKE "%' . $_POST["search"]["value"] .'%" ';
    } 

    if(isset($_POST["order"])) {
        $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']] .' '.$_POST['order']['0']['dir'] .' ';
    }else{
        $query .= 'ORDER BY ntrabajador_per DESC ';
    }
    
    if($_POST["length"] != -1){
        $query .= 'LIMIT ' .$_POST["start"]. ', ' .$_POST["length"];

    }

    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $datos = array();
    $filtered_rows = $stmt->rowCount();
    foreach($resultado as $fila){
        
        $sub_array = array();
        $sub_array[] = $fila["ntrabajador_per"];
        $sub_array[] = $fila["nombre_per"];
        $sub_array[] = $fila["apellidoP_per"];
        $sub_array[] = $fila["apellidoM_per"]; 
        $sub_array[] = $fila["area_per"];       
        $datos [] = $sub_array;     

      
    }

    $salida = array(
        "draw"          => intval($_POST["draw"]),
        "recordsTotal"  => $filtered_rows,
        "recordsFiltered"   => obtener_todos_registros(),
        "data"              => $datos

    );

    echo json_encode($salida);
?>
