<?php
include_once "../Inventario/bd.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$sentencia = $base_de_datos->query("SELECT e.folio_eqc as folio,e.descripcion_eqc as descrip, e.ip_eqc as ip FROM detalleasig_equipo as de, equipos_c as e WHERE de.id_eqc=e.id_eqc and de.id_asig=$id");
$equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
foreach ($equipos as $equipo) {
?>
    <tr>
        <td><?php echo $equipo->folio ?></td>
        <td><?php echo $equipo->descrip ?></td>
        <td><?php echo $equipo->ip ?></td>
    </tr>
<?php
}
?>