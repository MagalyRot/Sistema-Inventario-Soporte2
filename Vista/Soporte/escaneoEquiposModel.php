<?php

include_once "../Inventario/bd.php";
$folio = (isset($_POST['folio'])) ? $_POST['folio'] : '';
$sentencia = $base_de_datos->query("SELECT e.id_eqc as id,e.folio_eqc as folio,e.ip_eqc as ip,e.descripcion_eqc as descripcion,e.estado_eqc as estado,GROUP_CONCAT( a.folio_art,'..',a.nombre_art,'..',a.descripcion_art SEPARATOR '__') as componentes FROM equipos_c as e INNER JOIN detalle_equipos as de ON e.id_eqc=de.id_eqc INNER JOIN articulos as a ON de.id_art=a.id_art and  e.estado_eqc !=0 AND e.folio_eqc='$folio' GROUP BY e.id_eqc;");
$equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
foreach ($equipos as $equipo) {
?>
                            <div class="app-card app-card-settings shadow-sm p-4">
                                <div class="app-card-body">
                                    <form class="settings-form">
                                        <div class="row justify-content-between">
                                            <div class=" mb-3">
                                                <label for="setting-input-2" class="form-label">Folio del equipo</label>
                                                <input type="text" class="form-control" id="setting-input-1" value="<?php echo $equipo->folio ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between">
                                            <div class="mb-3">
                                                <label for="setting-input-1" class="form-label">Especificaciones<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                </label>
                                                <textarea class="form-control" aria-label="With textarea" id="descripcion" name="descripcion" disabled><?php echo $equipo->descripcion ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between">
                                            <label for="setting-input-1" class="form-label">Componentes<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                            </label>
                                            <div class="app-card app-card-orders-table mb-5">
                                                <div class="app-card-body">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0 text-left table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="cell">Folio</th>
                                                                    <th class="cell">Componente</th>
                                                                    <th class="cell">Detalles</th>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                    }
                    
            ?>