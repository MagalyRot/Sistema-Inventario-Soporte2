<?php
include 'Conexion2.php';
// CONEXIÓN CON LA BASE DE DATOS
$objeto   = new Conexion();
$conexion = $objeto->Conectar();

//OBTENCIÓN DE LOS DATOS DEL FORMULARIO DE ACTUALIZACIÓN A TRAVÉS DEL MÉTODO POST
$nombre      = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$folio       = (isset($_POST['folio'])) ? $_POST['folio'] : '';
$marca       = (isset($_POST['marca'])) ? $_POST['marca'] : '';
$modelo      = (isset($_POST['modelo'])) ? $_POST['modelo'] : '';
$num_poliza  = (isset($_POST['num_poliza'])) ? $_POST['num_poliza'] : '';
$categoria   = (isset($_POST['categoria'])) ? $_POST['categoria'] : '';
$proveedor   = (isset($_POST['proveedor'])) ? $_POST['proveedor'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$nombre1      = (isset($_POST['nombre1'])) ? $_POST['nombre1'] : '';
$folio1       = (isset($_POST['folio1'])) ? $_POST['folio1'] : '';
$marca1       = (isset($_POST['marca1'])) ? $_POST['marca1'] : '';
$modelo1      = (isset($_POST['modelo1'])) ? $_POST['modelo1'] : '';
$num_poliza1  = (isset($_POST['num_poliza1'])) ? $_POST['num_poliza1'] : '';
$categoria1   = (isset($_POST['categoria1'])) ? $_POST['categoria1'] : '';
$proveedor1   = (isset($_POST['proveedor1'])) ? $_POST['proveedor1'] : '';
$descripcion1 = (isset($_POST['descripcion1'])) ? $_POST['descripcion1'] : '';

$opcion      = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$art_id      = (isset($_POST['id'])) ? $_POST['id'] : '';
$estado=0;

switch($opcion){
    case 1:
        $consulta  = "INSERT INTO articulos (folio_art, nombre_art, modelo_art, marca_art, descripcion_art, numPoliza_art,proveedor_art,categoria,estado_art) VALUES('$folio1', '$nombre1', '$modelo1', '$marca1', '$descripcion1', '$num_poliza1',  '$proveedor1','$categoria1', '1') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();             
        break;
    case 2:        
        $consulta  = "UPDATE articulos SET folio_art='$folio', nombre_art='$nombre', modelo_art='$modelo', marca_art='$marca', descripcion_art='$descripcion', numPoliza_art='$num_poliza', proveedor_art='$proveedor', categoria='$categoria' WHERE id_art='$art_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        break;  
    case 3:        
        $consulta  = "UPDATE articulos SET estado_art='0' WHERE id_art='$art_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                             
        break;
}



function categorias($categoria){
    $conect = mysqli_connect("localhost","root","","sistema_urse");
    $conect->set_charset("utf8");
    $qry_categorias="SELECT count(*) as  num from vista_articulos2 where categoria='$categoria'";
    if ($resultado = mysqli_query($conect, $qry_categorias)) {
    /* obtener array asociativo */
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo '<div class="stats-figure">'.$row["num"].'</div>';
        //echo '<option value="'.$row["id_prov"].'">'.$row["empresa_prov"].'</option>';
    }
    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
    }
}
//print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
