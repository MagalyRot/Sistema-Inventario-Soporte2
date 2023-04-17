<?php

include("Conexion.php");
    
function obtener_todos_registros(){
    include("Conexion.php");
    $stmt = $conexion->prepare("SELECT *FROM articulos_ocupados"); 
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}

    $query = '';
    $salida = array();   
    $query = "SELECT * from articulos_ocupados ";
    $columns = array('folio','nombre','modelo','marca','descripcion','poliza','proveedor','categoria','estado');
 
    if(isset($_POST["search"]["value"])){
        $query .= 'where folio LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR nombre LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR modelo LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR marca LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR poliza LIKE "%' . $_POST["search"]["value"] .'%" ';
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
        $sub_array[] = $fila["folio"];
        $sub_array[] = $fila["nombre"];
        $sub_array[] = $fila["modelo"];
        $sub_array[] = $fila["marca"];
        $sub_array[] = $fila["descripcion"];
        $sub_array[] = $fila["poliza"];
        $sub_array[] = $fila["proveedor"];
        $sub_array[] = $fila["categoria"];
        if(($fila["estado"]!=0)){
        $sub_array[] =
                         '<div class="container px-4 text-center">
                                 <div class="col-4">
                                     <span class="badge bg-warning" id="' . $fila["estado"] . '">Ocupado</span>
                                    
                                 </div>
                             </div>
                         </div>';   
        }  
        $sub_array[] = '
                            <div class="container px-1 text-center">
                                <div class="row g-4">
                                     <div class="col-6">
                                        <button type="submit" name="btnBorrar" id="'.$fila["id"].'" class="btn btn-danger btnBorrar"><i class="bi bi-trash"></i></button>
                                      </div>
                                      <div class="col-6">
                                            <button type="submit" name="btnEditar" class="btn btn-warning btnEditar" id="'.$fila["id"].'"><i class="bi bi-pencil-square"></i></button>
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