<?php

function getEquiposDisponibles()
{
    include_once "bd.php";
    $sentencia = $base_de_datos->query("SELECT e.id_eqc as id,e.folio_eqc as folio,e.ip_eqc as ip,e.descripcion_eqc as descripcion,e.estado_eqc as estado,GROUP_CONCAT( a.folio_art,'..',a.nombre_art,'..',a.descripcion_art SEPARATOR '__') as componentes FROM equipos_c as e INNER JOIN detalle_equipos as de ON e.id_eqc=de.id_eqc INNER JOIN articulos as a ON de.id_art=a.id_art and  e.estado_eqc=1 GROUP BY e.id_eqc");
    $equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    foreach ($equipos as $equipo) {
?>
        <tr>
            <td><?php echo $equipo->folio ?></td>
            <td>
                <table class="table  table-bordered">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Componente</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach (explode("__", $equipo->componentes) as $componentesConcatenados) {
                            $componente = explode("..", $componentesConcatenados)
                        ?>
                            <tr>
                                <td><?php echo $componente[0] ?></td>
                                <td><?php echo $componente[1] ?></td>
                                <td><?php echo $componente[2] ?></td>
                            </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </td>
            <td><?php echo $equipo->descripcion ?></td>
            <td><?php echo $equipo->ip ?></td>
            <td>
                <div class="container px-4 text-center">
                    <div class="col-4">
                        <span class="badge bg-success" id="<?php echo $equipo->estado ?>">Disponible</span>
                    </div>
                </div>

            </td>
            <td scope=' col'>
                <div class="col-auto">
                    <!-- Button para mostrar el QR -->
                    <button id="limpiarCampos" type="button" class="btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#modalQR" onclick="verQr('<?php echo $equipo->folio ?>')">
                        Ver
                    </button>
                </div>


                <!-- Modal para QR-->
                <div class="modal fade" id="modalQR" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Código QR </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="container p-3 text-center">
                                <div>
                                    <img alt="Código QR" id="codigo">
                                </div>
                                <div class="pt-3">
                                    <button type="button" class="btn btn-info" id="btnDescargar">Descargar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="container text-center">
                    <div class="row">
                        <div class="col-6">
                            <form action='' method='POST'>
                                <input type='hidden' name='id_per' value="<?php echo $equipo->id ?>">
                                <input type='hidden' value='editarUsuario' name='valor'>
                                <button type="submit" class="btn btn-outline-success"><i class="bi bi-check2-square"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
<?php
    }
}
