<?php

include_once "../Inventario/bd.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$sentencia = $base_de_datos->query("SELECT a.folio_art as folio,a.nombre_art as nombre, a.modelo_art as modelo FROM detalleasig_art as da, articulos as a WHERE da.id_art=a.id_art and da.id_asig=$id");
$equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
                        foreach ($equipos as $equipo) {
                        ?>
                            <tr>
                                <td><?php echo $equipo->folio ?></td>
                                <td><?php echo $equipo->nombre ?></td>
                                <td><?php echo $equipo->modelo ?></td>
                            </tr>
                        <?php
                        }
                        ?>