<?php

include("../Inventario/Conexion.php");
//include("../Sistema-Inventario-Soporte/Vista/Inventario/Conexion.php");    
function obtener_todos_registros(){
   include("../Inventario/Conexion.php");
    //include("../Sistema-Inventario-Soporte/Vista/Inventario/Conexion.php");
    $stmt = $conexion->prepare("SELECT *FROM vista_rutas"); 
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}

    $query = '';
    $salida = array();   
    $query = "SELECT * from vista_rutas ";
    $columns = array('nodo','parcheo','puerto','segmento','num_segmento','vlan');
 
    if(isset($_POST["search"]["value"])){
        $query .= 'where nodo LIKE "%' . $_POST["search"]["value"] .'%" '; 
        $query .= 'OR parcheo LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR puerto LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR segmento LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR num_segmento LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR vlan LIKE "%' . $_POST["search"]["value"] .'%" ';      
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
        $sub_array[] = $fila["nodo"]; 
        $sub_array[] = $fila["parcheo"]; 
        $sub_array[] = $fila["puerto"]; 
        $sub_array[] = $fila["segmento"]; 
        $sub_array[] = $fila["num_segmento"]; 
        $sub_array[] = $fila["vlan"]; 
        $sub_array[] = '
                            <div class="container px-1 text-center">
                                <div class="row g-4">
                                     <div class="col-6">
                                     <!-- Button para abrir modal de equipos -->
                                     <button type="submit" class="btn btn-outline-warning btnVer" id="'.$fila["id"].'" >
                                         Ver
                                     </button>
                                      </div>
                                </div>
                            </div/>
                            
                            '; 
        $sub_array[] = '
                            <div class="container px-1 text-center">
                                <div class="row g-4">
                                     <div class="col-4">
                                        <button type="submit" name="btnBorrar" id="'.$fila["id"].'" class="btn btn-danger btnBorrar"><i class="bi bi-trash"></i></button>
                                      </div>
                                      <div class="col-4">
                                      <!--
                                           <form action="../Soporte/rutaRed.php" method="POST">
                                              <input type="hidden" name="id_ruta" value="'.$fila["id"].'">
                                              <input type="hidden" value="editarruta" name="valor">
                                              <button type="submit"  class="btn btn-warning btnEditar" ><i class="bi bi-pencil-square"></i></button>
                                           </form>
                                           -->
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