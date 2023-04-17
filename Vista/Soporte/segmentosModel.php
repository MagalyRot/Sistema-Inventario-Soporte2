<?php
include("../Inventario/Conexion2.php");
// CONEXIÓN CON LA BASE DE DATOS
$objeto   = new Conexion();
$conexion = $objeto->Conectar();

//OBTENCIÓN DE LOS DATOS DEL FORMULARIO DE ACTUALIZACIÓN A TRAVÉS DEL MÉTODO POST
$segmento      = (isset($_POST['segmento'])) ? $_POST['segmento'] : '';
$num_segmento      = (isset($_POST['num_segmento'])) ? $_POST['num_segmento'] : '';
$opcion    = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$seg_id   = (isset($_POST['id'])) ? $_POST['id'] : '';
$estado=0;

switch($opcion){
    case 1:
        $consulta  = "INSERT INTO segmentos (nombre_seg,num_seg,estado_seg) VALUES('$segmento', '$num_segmento', '1') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();             
        break;
    case 2:        
        $consulta  = "UPDATE segmentos SET folio_art='$folio', nombre_art='$nombre', modelo_art='$modelo', marca_art='$marca', descripcion_art='$descripcion', numPoliza_art='$num_poliza', proveedor_art='$proveedor', categoria='$categoria' WHERE id_art='$art_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        break;  
    case 3:        
        $consulta  = "UPDATE segmentos SET estado_seg='0' WHERE id_seg='$seg_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                             
        break;
}


// MUESTRA EL TOTAL DE RUTAS ACTIVAS
function rutas(){
    $conect = mysqli_connect("localhost","root","","sistema_urse");
    $conect->set_charset("utf8");
    $qry_categorias="SELECT count(*) as  num from vista_rutas";
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

// MUESTRA EL TOTAL DE VLANS ACTIVOS
function vlans(){
    $conect = mysqli_connect("localhost","root","","sistema_urse");
    $conect->set_charset("utf8");
    $qry_categorias="SELECT count(*) as  num from vlan WHERE estado_vlan=1";
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

// MUESTRA EL TOTAL DE SEGMENTOS ACTIVOS
function segmentos(){
    $conect = mysqli_connect("localhost","root","","sistema_urse");
    $conect->set_charset("utf8");
    $qry_categorias="SELECT count(*) as  num from segmentos WHERE estado_seg=1";
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

// MUESTRA EL TOTAL DE EQUIPOS DE CÓMPUTO ACTIVOS
function equipos(){
    $conect = mysqli_connect("localhost","root","","sistema_urse");
    $conect->set_charset("utf8");
    $qry_categorias="SELECT count(*) as  num from equipos_c WHERE estado_eqc=1";
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

function getEquipos(){
    $conect = mysqli_connect("localhost","root","","sistema_urse");
    $conect->set_charset("utf8");
    $sql= "SELECT * from equipos_c WHERE rutaRed_eqc=1";
    $getIns=mysqli_query($conect,$sql);
    if($getIns->num_rows >0){
        while($row=mysqli_fetch_array($getIns)){    
    ?>
<tr>
    <th><?php echo $row['folio_eqc'] ?></th>
    <th><?php echo $row['ip_eqc'] ?></th>
    <?php
        }
    }
}

function getVlan(){
    $conect = mysqli_connect("localhost","root","","sistema_urse");
     $conect->set_charset("utf8");
     $qry_vlan="SELECT * FROM vlan WHERE estado_vlan=1 order by vlan";
	 if ($resultado = mysqli_query($conect, $qry_vlan)) {
	 /* obtener array asociativo */
	 while ($row = mysqli_fetch_assoc($resultado)) {
	     echo '<option value="'.$row["id_vlan"].'">'.$row["vlan"].'</option>';
	 }
	 /* liberar el conjunto de resultados */
	 mysqli_free_result($resultado);
	 }
    echo "<br>";
}


function getSegmentos(){
    $conect = mysqli_connect("localhost","root","","sistema_urse");
     $conect->set_charset("utf8");
     $qry_vlan="SELECT * FROM segmentos WHERE estado_seg=1 order by nombre_seg";
	 if ($resultado = mysqli_query($conect, $qry_vlan)) {
	 /* obtener array asociativo */
	 while ($row = mysqli_fetch_assoc($resultado)) {
	     echo '<option value="'.$row["id_seg"].'">'.$row["nombre_seg"].'</option>';
	 }
	 /* liberar el conjunto de resultados */
	 mysqli_free_result($resultado);
	 }
    echo "<br>";
}

function getParcheo(){
    $conect = mysqli_connect("localhost","root","","sistema_urse");
     $conect->set_charset("utf8");
     $qry_vlan="SELECT id_art,folio_art FROM articulos WHERE estado_art=1 and categoria=4 and nombre_art LIKE '%panel%' order by folio_art;";
	 if ($resultado = mysqli_query($conect, $qry_vlan)) {
	 /* obtener array asociativo */
	 while ($row = mysqli_fetch_assoc($resultado)) {
	     echo '<option value="'.$row["id_art"].'">'.$row["folio_art"].'</option>';
	 }
	 /* liberar el conjunto de resultados */
	 mysqli_free_result($resultado);
	 }
    echo "<br>";
}

//print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
