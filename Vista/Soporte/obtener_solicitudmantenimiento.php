<?php include('../../Controlador/conect.php');

$output= array();
$sql = "SELECT * FROM vista_solicitudmantenimiento ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id',
	1 => 'folioM',
	2 => 'solicitante',
	3 => 'nombre',
	4 => 'ap',
	5 => 'am',
	6 => 'area',
	7 => 'equipo',
    8 => 'tipoM',
	9 => 'fechaI',
	10 => 'observaciones',
	11 => 'estado',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE folioM like '%".$search_value."%'";
	$sql .= " OR solicitante like '%".$search_value."%'";
	$sql .= " OR nombre like '%".$search_value."%'";
	$sql .= " OR ap like '%".$search_value."%'";
	$sql .= " OR am like '%".$search_value."%'";
	$sql .= " OR equipo like '%".$search_value."%'";
	$sql .= " OR area like '%".$search_value."%'";

}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY folioM desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['folioM'];
	if($row['estado']==1){
		$sub_array[] = '<span class="badge bg-warning">Pendiente</span>';
	}
	$sub_array[] = $row['solicitante'];
	$sub_array[] = $row['nombre'];
	$sub_array[] = $row['ap'];
    // $sub_array[] = $row['am'];
	
    $sub_array[] = $row['tipoM'];
    $sub_array[] = $row['equipo'];
    $sub_array[] = $row['fechaI'];
	if($row['estado']==1){
		$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn app-btn-secondary btn-sm cancelarMant" >Cancelar</a>';  
		// $sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"   class="btn app-btn-secondary btn-sm editArticulos" >Editar equipo</a>';		
		$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"   class="btn app-btn-secondary btn-sm finalizarMant" >Finalizar</a>';		
	}
	$sub_array[] = $row['area'];
	$sub_array[] = $row['observaciones'];
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
