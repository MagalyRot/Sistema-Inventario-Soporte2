<?php
include_once "../Inventario/bd.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$sentencia = $base_de_datos->query("SELECT p.ntrabajador_per as numT, concat_ws(' ', p.nombre_per,p.apellidoP_per,p.apellidoM_per) as persona,tp.tipo_per as tipo
FROM personal as p, detalleasig_per as dp,tipo_personal as tp
WHERE p.id_per=dp.id_personal and p.tipo_per=tp.id_tipoper and (tp.tipo_per='Responsable' OR tp.tipo_per='Personal') and dp.id_asig=$id");
$equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
foreach ($equipos as $equipo) {
?>
    <tr>
        <td><?php echo $equipo->numT ?></td>
        <td><?php echo $equipo->persona ?></td>
        <td><?php echo $equipo->tipo ?></td>
    </tr>
<?php
}
?>