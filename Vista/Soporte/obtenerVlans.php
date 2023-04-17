<?php

include("../Inventario/Conexion.php");
    
function obtener_todos_registros(){
    include("../Inventario/Conexion.php");
    $stmt = $conexion->prepare("SELECT *FROM vista_vlan"); 
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}

    $query = '';
    $salida = array();   
    $query = "SELECT * from vista_vlan ";
    $columns = array('vlan','estado_vlan');
 
    if(isset($_POST["search"]["value"])){
        $query .= 'where vlan LIKE "%' . $_POST["search"]["value"] .'%" ';     
         
    } 

    if(isset($_POST["order"])) {
        $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']] .' '.$_POST['order']['0']['dir'] .' ';
    }else{
        $query .= 'ORDER BY id_vlan DESC ';
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
        $sub_array[] = $fila["vlan"]; 
            $sub_array[] =
                             '<div class="container px-4 text-center">
                                     <div class="col-4">
                                         <span class="badge bg-success" id="' . $fila["estado_vlan"] . '">Activo</span>
                                        
                                     </div>
                                 </div>
                             </div>';   
         
        $sub_array[] = '
                            <div class="container px-1 text-center">
                                <div class="row g-4">
                                     <div class="col-6">
                                        <button type="submit" name="btnBorrar" id="'.$fila["id_vlan"].'" class="btn btn-danger btnBorrar"><i class="bi bi-trash"></i></button>
                                      </div>
                                      <div class="col-6">
                                            <button type="submit" name="btnEditar" class="btn btn-warning btnEditar" id="'.$fila["id_vlan"].'"><i class="bi bi-pencil-square"></i></button>
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