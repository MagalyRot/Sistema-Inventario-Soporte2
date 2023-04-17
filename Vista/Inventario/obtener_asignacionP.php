<?php

include("Conexion.php");
    
function obtener_todos_registros(){
    include("Conexion.php");
    $stmt = $conexion->prepare("SELECT *FROM vista_asignacionespermanentes"); 
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}

    $query = '';
    $salida = array();   
    $query = "SELECT * from vista_asignacionespermanentes ";
    $columns = array('folio','fechaI','ubi','persona');
 
    if(isset($_POST["search"]["value"])){
        $query .= 'where folio LIKE "%' . $_POST["search"]["value"] .'%" ';   
        $query .= 'OR fechaI LIKE "%' . $_POST["search"]["value"] .'%" '; 
        $query .= 'OR ubi LIKE "%' . $_POST["search"]["value"] .'%" ';  
        $query .= 'OR persona LIKE "%' . $_POST["search"]["value"] .'%" '; 
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
    $sub_array[] = $fila["folio"];
    $sub_array[] = '<a href="javascript:void();" data-id="' . $fila['id'] . '"  class="btn app-btn-secondary btn-sm Verbtn" >Ver</a>';
    $sub_array[] = '<a href="javascript:void();" data-id="' . $fila['id'] . '"  class="btn app-btn-secondary btn-sm VerbtnE" >Ver</a>';
    $sub_array[] = $fila["fechaI"];
    $sub_array[] = $fila["persona"];
    $sub_array[] = '<a href="javascript:void();" data-id="' . $fila['id'] . '"  class="btn app-btn-secondary btn-sm VerbtnP" >Ver</a>';
    $sub_array[] = $fila["ubi"];
    $sub_array[] = '<span class="badge bg-success" id="' . $fila["estado"] . '">Activo</span>';
    $sub_array[] = '<div class="container px-1 text-center">
                    <div class="row g-4">
                       <div class="col-6">
                            <a href="javascript:void();" id="' . $fila["id"] . '" class="btn app-btn-secondary btn-sm Finbtn">Finalizar</a>
                        </div>
                    </div>
                   </div/>';
    $sub_array[] = '<div class="container px-1 text-center">
                      <div class="row g-4">
                          <div class="col-6">
                              <a href="javascript:void();" id="' . $fila["id"] . '"  class="btn app-btn-secondary btn-sm Cancelbtn">Cancelar</a>
                         </div>
                       </div>
                    </div/>';
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