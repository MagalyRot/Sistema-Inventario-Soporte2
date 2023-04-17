<?php
include_once "../Inventario/bd.php";
$folio = (isset($_POST['folio'])) ? $_POST['folio'] : '';
$sentencia = $base_de_datos->query(" SELECT e.ip_eqc as ip, rr.nodo_red as nodo, a.folio_art as parcheo,rr.puertoPanel_red as puerto,s.nombre_seg as segmento,s.num_seg as num_segmento,v.vlan as vlan    
FROM ruta_red as rr, vlan as v, segmentos as s, articulos as a, equipos_c as e
WHERE rr.panelParcheo_red = a.id_art and s.id_seg = rr.segmento and v.id_vlan=rr.vlan and rr.estado_red=1 and e.rutaRed_eqc=rr.id_red and e.folio_eqc='$folio'");
$equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
foreach ($equipos as $equipo) {
?>
    <tr>
        <td><?php echo $equipo->ip ?></td>
        <td><?php echo $equipo->nodo ?></td>
        <td><?php echo $equipo->parcheo ?></td>
        <td><?php echo $equipo->puerto ?></td>
        <td><?php echo $equipo->segmento ?></td>
        <td><?php echo $equipo->num_segmento ?></td>
        <td><?php echo $equipo->vlan ?></td>
    </tr>
<?php
}
?>
