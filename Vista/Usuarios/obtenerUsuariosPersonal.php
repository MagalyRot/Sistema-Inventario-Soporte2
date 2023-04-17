<?php include('../../Controlador/conect.php');

$output= array();
$sql = "SELECT * FROM vista_personal ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id',
	1 => 'nombre',
	2 => 'apellidoP',
	3 => 'apellidoM',
	4 => 'num_trabajador',
	5 => 'correo',
	6 => 'area',
	7 => 'rol',
	8 => 'estado',

);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE nombre like '%".$search_value."%'";
	$sql .= " OR apellidoP like '%".$search_value."%'";
	$sql .= " OR apellidoM like '%".$search_value."%'";
	$sql .= " OR num_trabajador like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
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
	$sub_array[] = $row['id'];
	$sub_array[] = $row['nombre'];
	$sub_array[] = $row['apellidoP'];
	$sub_array[] = $row['apellidoM'];
	$sub_array[] = $row['num_trabajador'];
	$sub_array[] = $row['correo'];
	$sub_array[] = $row['area'];
	$sub_array[] = $row['rol'];
	if($row['estado']==2 && $row['estadoUser']==1){
		$sub_array[] = '<span class="badge bg-success">Correo Activo</span>';
		$sub_array[] = '<a href="javascript:void();" data-id="'.$row['idusu'].'"  class="btn app-btn-secondary btn-sm desactivarCorreoBtn">Desactivar</a>';
	}

	if($row['estado']==2 && $row['estadoUser']==0){
		$sub_array[] = '<span class="badge bg-danger">Correo Inactivo</span>';
		$sub_array[] = '<a href="javascript:void();" data-id="'.$row['idusu'].'"  class="btn app-btn-secondary btn-sm ActivarCorreoBtn" >Activar</a>';
	}

	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
