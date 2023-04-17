<?php
include("../../Controlador/ConexionD2.php");
    
function registros_personal(){
    include("../../Controlador/ConexionD2.php");
    $stmt = $conexion->prepare("SELECT * FROM vista_administrativos"); 
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}

    $query = '';
    $salida = array();   
    $query = "SELECT  * FROM vista_administrativos ";

    $columns = array('id','nombre','apellidoP','apellidoM','num_trabajador','tipo_personal','area','estado');
 
    if(isset($_POST["search"]["value"])){
        $query .= 'where num_trabajador LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR nombre LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR apellidoP LIKE "%' . $_POST["search"]["value"] .'%" ';
        $query .= 'OR apellidoM LIKE "%' . $_POST["search"]["value"] .'%" ';
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
        $sub_array[] = $fila["nombre"];
        $sub_array[] = $fila["apellidoP"];
        $sub_array[] = $fila["apellidoM"];
        $sub_array[] = $fila["num_trabajador"];
        $sub_array[] = $fila["tipo_personal"];
        $sub_array[] = $fila["area"];
        if(($fila["estado"])==1)
            {
                $sub_array[] = '<span class="badge bg-success">Activo</span>'; 
            }else{
                $sub_array[] = '<span class="badge bg-danger">Inactivo</span>'; 
            }
		$sub_array[] = '<div class="container px-4 text-center">
                            <div class="row ">
                                <div class="col-6">
                                    <a class="btn-sm app-btn-secondary" href="#">Editar</a>
                                </div>
                                <div class="col-6">
                                    <a class="btn-sm app-btn-secondary" href="#">Desabilitar</a>
                                </div>
                            </div>
                        </div>  ';  
        $datos [] = $sub_array;     

      
    }

    $salida = array(
        "draw"          => intval($_POST["draw"]),
        "recordsTotal"  => $filtered_rows,
        "recordsFiltered"   => registros_personal(),
        "data"              => $datos

    );

    echo json_encode($salida);
?>