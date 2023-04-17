<?php
include_once "../Inventario/bd.php";
$folio = (isset($_POST['folio'])) ? $_POST['folio'] : '';
$sentencia = $base_de_datos->query("SELECT D.id_mant AS id, M.folio_mant AS folioM ,D.id_personal AS Atendido, P.ntrabajador_per AS NSolicitante,concat_ws(' ', 
P.nombre_per, P.apellidoP_per) as nombre, A.area_are as area , 
M.tipo_mant as tipo, M.fecha_mant as fechaI, M.observaciones_mant AS descripcionIngreso, D.finaliza as fechaF, D.observacionesF AS descripcionSalida
From detalle_mantenimiento D 
JOIN mantenimiento M 
JOIN personal P
JOIN areas A
JOIN equipos_c E
ON D.id_mant = M.id_mant
AND M.solicitante = P.id_per
AND A.id_are = P.area_per
AND D.estado_dm = 2
AND E.id_eqc = M.equipo_mant
AND E.folio_eqc='$folio'");
$equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
foreach ($equipos as $equipo) {
?>
    <tr>
        <td><?php echo $equipo->folioM ?></td>
        <td><?php echo $equipo->Atendido ?></td>
        <td><?php echo $equipo->NSolicitante?> - <?php echo $equipo->nombre?></td>
        <td><?php echo $equipo->area ?></td>
        <td><?php echo $equipo->tipo ?></td>
        <td><?php echo $equipo->fechaI ?></td>
        <td><?php echo $equipo->observacionIngreso ?></td>
        <td><?php echo $equipo->fechaF ?></td>
        <td><?php echo $equipo->descripcionSalida ?></td>
    </tr>
<?php
}
?>