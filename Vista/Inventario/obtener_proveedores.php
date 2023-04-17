<?php

include("Conexion.php");
    
function obtener_todos_registros(){
    include("Conexion.php");
    $stmt = $conexion->prepare("SELECT *FROM vista_proveedores"); 
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}

    $query = '';
    $salida = array();   
    $query = "SELECT * from vista_proveedores ";
    $columns = array('empresa_prov','direccion_prov','telefono_prov','correo_prov','estado_prov');
 
    if(isset($_POST["search"]["value"])){
        $query .= 'where empresa_prov LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR direccion_prov LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR telefono_prov LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR correo_prov LIKE "%' . $_POST["search"]["value"] .'%" ';
        
    } 

    if(isset($_POST["order"])) {
        $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']] .' '.$_POST['order']['0']['dir'] .' ';
    }else{
        $query .= 'ORDER BY id_prov DESC ';
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
        $sub_array[] = $fila["empresa_prov"];
        $sub_array[] = $fila["direccion_prov"];
        $sub_array[] = $fila["telefono_prov"];
        $sub_array[] = $fila["correo_prov"];
        if(($fila["estado_prov"]!=0)){
        $sub_array[] =
                         '<div class="container px-4 text-center">
                                 <div class="col-4">
                                     <span class="badge bg-success" id="' . $fila["estado_prov"] . '">Activo</span>
                                    
                                 </div>
                             </div>
                         </div>';   
        }  
        $sub_array[] = '
                            <div class="container px-1 text-center">
                                <div class="row g-4">
                                     <div class="col-6">
                                        <button type="submit" name="btnBorrar" id="'.$fila["id_prov"].'" class="btn btn-danger btnBorrar"><i class="bi bi-trash"></i></button>
                                      </div>
                                      <div class="col-6">
                                            <button type="submit" name="btnEditar" class="btn btn-warning btnEditar" id="'.$fila["id_prov"].'"><i class="bi bi-pencil-square"></i></button>
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