<?php include('../../Controlador/conect.php');

$output= array();
$sql = "SELECT * FROM vista_mantenimientosfinalizados ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id',
	1 => 'folioM',
	2 => 'Atendido',
	3 => 'NSolicitante',
	4 => 'SNombre',
	5 => 'Sap',
	6 => 'area_are',
	7 => 'folio_eqc',
    8 => 'tipo_mant',
	9 => 'fecha_mant',
	10 => 'descripcionIngreso',
	11 => 'finaliza',
	12 => 'descripcionSalida',
	13 => 'estado_dm'
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE folioM like '%".$search_value."%'";
	$sql .= " OR NSolicitante like '%".$search_value."%'";
	$sql .= " OR Snombre like '%".$search_value."%'";
	$sql .= " OR Sap like '%".$search_value."%'";
	$sql .= " OR folio_eqc like '%".$search_value."%'";
	$sql .= " OR tipo_mant like '%".$search_value."%'";
	$sql .= " OR area_are like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY finaliza desc";
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
	if($row['estado_dm']==2){ $sub_array[] = '<span class="badge bg-success">Finalizado</span>';}
	// $sub_array[] = $row['Atendido'];
	$sub_array[] = $row['NSolicitante'];
	$sub_array[] = $row['SNombre'];
	$sub_array[] = $row['Sap'];
	$sub_array[] = $row['area_are'];
	$sub_array[] = $row['folio_eqc'];
    $sub_array[] = $row['tipo_mant'];
    $sub_array[] = $row['fecha_mant'];
    $sub_array[] = $row['descripcionIngreso'];
    $sub_array[] = $row['finaliza'];
    $sub_array[] = $row['descripcionSalida'];

	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
