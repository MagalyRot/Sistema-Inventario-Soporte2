<?php

include("../Controlador/Conexion.php");
    
function obtener_todos_registros(){
    include('../Controlador/Conexion.php');
    $stmt = $conexion->prepare("SELECT *FROM articulos"); 
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}
    
    $query = '';
    $salida = array();   
    $query = "SELECT * from articulos";
    $columns = array('folio_art','nombre_art','modelo_art','marca_art','descripcion_art','numPoliza_art','categoria','estado_art');
 
    if(isset($_POST["search"]["value"])){
        $query .= 'where folio_art LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR nombre_art LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR modelo_art LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR marca_art LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR numPoliza_art LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR categoria LIKE "%' . $_POST["search"]["value"] .'%" ';
        
    }  

    if(isset($_POST["order"])) {
        $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']] .' '.$_POST['order']['0']['dir'] .' ';
    }else{
        $query .= 'ORDER BY id DESC ';
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
        $sub_array[] = $fila["folio_art"];
        $sub_array[] = $fila["nombre_art"];
        $sub_array[] = $fila["modelo_art"];
        $sub_array[] = $fila["marca_art"];
        $sub_array[] = $fila["descripcion_art"];
        $sub_array[] = $fila["numPoliza_art"];
        $sub_array[] = $fila["categoria"];
        if($fila["estado_art"]!=0){
        $sub_array[] = '<div class="container px-4 text-center">
                              <td class="cell"><span class="badge bg-success">Activo</span></td>
                        </div>';     
        }
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