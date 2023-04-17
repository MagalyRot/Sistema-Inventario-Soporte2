<?php
include_once "../Inventario/bd.php";
$folio = (isset($_POST['folio'])) ? $_POST['folio'] : '';
$sentencia = $base_de_datos->query("SELECT a.id_asig as id, a.folio_asig as folio, a.fecha_asig as fechaI,a.fechaFin as fechaF, concat_ws(' ,',u.campus_ubi,u.edificio_ubi,u.piso_ubi,u.aula_ubi) as ubi,concat_ws(' ', p.nombre_per,p.apellidoP_per,p.apellidoM_per) as persona, are.area_are as area,a.tipo as tipo, a.estado_asig as estado
FROM personal as p INNER JOIN detalleasig_per as dp ON dp.id_personal=p.id_per INNER JOIN asignaciones as a ON a.id_asig=dp.id_asig INNER JOIN ubicaciones as u ON a.ubicacion=u.id_ubi INNER JOIN detalleasig_equipo as de ON a.id_asig=de.id_asig INNER JOIN equipos_c as e ON de.id_eqc=e.id_eqc INNER JOIN areas as are ON p.area_per=are.id_are AND e.folio_eqc='$folio' and p.tipo_per=1 and a.estado_asig!=3 ORDER by a.id_asig DESC");
$equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
foreach ($equipos as $equipo) {
?>
    <tr>
        <td><?php echo $equipo->folio ?></td>
        <td><?php echo $equipo->fechaI ?></td>
        <td><?php echo $equipo->fechaF ?></td>
        <td><?php echo $equipo->persona ?></td>
        <td><?php echo $equipo->area ?></td>
        <td><?php echo $equipo->ubi ?></td>
        <td><?php echo $equipo->tipo ?></td>
        <?php
        $estado=$equipo->tipo;
        if ($estado == 2) {
        ?>
            <td><span class="badge bg-succes">Activo</span></td>
        <?php
        } else {
        ?>
            <td><span class="badge bg-warning">Finalizado</span></td>
        <?php
        }
        ?>
    </tr>
<?php
}
?>