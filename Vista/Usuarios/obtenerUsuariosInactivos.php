<?php include('../../Controlador/conect.php');

$output= array();
$sql = "SELECT * FROM vista_inactivos ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id',
	1 => 'nombre',
	2 => 'apellidoP',
	3 => 'apellidoM',
	4 => 'num_trabajador',
	5 => 'tipo_personal',
	6 => 'area',
	7 => 'estado',
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
	$sub_array[] = $row['tipo_personal'];
	$sub_array[] = $row['area'];
	if($row['estado']==1){
		// $sub_array[] = '<span class="badge bg-success">Activo</span>';
		// $sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn app-btn-secondary btn-sm editbtn" >Editar</a>' ; 
		// $sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn app-btn-secondary btn-sm deleteBtn" >Desactivar</a>';
		
	}else{
		$sub_array[] = '<span class="badge bg-danger">Inactivo</span>';
		$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn app-btn-secondary btn-sm ActivarBtn" >Activar</a>' ; 
		$sub_array[] =  '';
	}$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
