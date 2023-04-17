<?php
include_once "../Inventario/bd.php";
$fechaI = (isset($_POST['fechaI'])) ? $_POST['fechaI'] : '';
$fechaF = (isset($_POST['fechaF'])) ? $_POST['fechaF'] : '';
$sentencia = $base_de_datos->query(" SELECT a.id_asig as id, a.folio_asig as folio, a.fecha_asig as fechaI, a.fecha_dev as fechaE,a.fechaFin as fechaF, concat_ws(' ,',u.campus_ubi,u.edificio_ubi,u.piso_ubi,u.aula_ubi) as ubi,concat_ws(' ', p.nombre_per,p.apellidoP_per,p.apellidoM_per) as persona, a.estado_asig as estado,a.tipo as tipo
FROM personal as p INNER JOIN detalleasig_per as dp ON dp.id_personal=p.id_per INNER JOIN asignaciones as a ON a.id_asig=dp.id_asig INNER JOIN ubicaciones as u ON a.ubicacion=u.id_ubi and p.tipo_per=3 and a.estado_asig=2 and a.fechaFin BETWEEN '$fechaI' AND '$fechaF' ORDER BY a.fechaFin DESC");
$equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
foreach ($equipos as $equipo) {
?>
    <tr>
        <td><?php echo $equipo->folio ?></td>
        <td><?php echo $equipo->fechaI ?></td>
        <td><?php echo $equipo->fechaE ?></td>
        <td><?php echo $equipo->fechaF?></td>
        <td><?php echo $equipo->ubi ?></td>
        <td><?php echo $equipo->persona ?></td>
        <td><?php echo $equipo->tipo ?></td>
    </tr>
<?php
}
?>