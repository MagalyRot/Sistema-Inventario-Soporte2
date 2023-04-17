<?php

include("Conexion.php");
    
function obtener_todos_registros(){
    include("Conexion.php");
    $stmt = $conexion->prepare("SELECT *FROM administrativos_prestamo"); 
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}

    $query = '';
    $salida = array();   
    $query = "SELECT * from administrativos_prestamo ";
    $columns = array('nombre_cat');
 
    if(isset($_POST["search"]["value"])){
        $query .= 'where nombre_per LIKE "%' . $_POST["search"]["value"] .'%" '; 
        $query .= 'OR apellidoP_per LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR apellidoM_per LIKE "%' . $_POST["search"]["value"] .'%" '; 
        $query .= 'OR ntrabajador_per LIKE "%' . $_POST["search"]["value"] .'%" ';        
    } 

    if(isset($_POST["order"])) {
        $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']] .' '.$_POST['order']['0']['dir'] .' ';
    }else{
        $query .= 'ORDER BY id_per DESC ';
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
        $sub_array[] = '
                            <div class="container px-1 text-center">
                                <div class="row g-4">
                                      <div class="col-6">
                                            <button type="submit" name="btnEditar" class="btn btn-outline-success btnEditar" id="'.$fila["id_per"].'"><i class="bi bi-check2-square"></i></button>
                                    </div>
                                </div>
                            </div/>
                            ';  
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