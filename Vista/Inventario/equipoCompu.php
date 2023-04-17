<?php
$con = mysqli_connect('localhost', 'root', '', 'sistema_urse');
$con->set_charset("utf8");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/sistemaIS.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css">
    <!-- Extension responsiva-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.css">

</head>

<body class="app">
    <header class="app-header fixed-top">
        <?php require("navbarInventario.php"); ?><!-- Navbar -->
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <?php require("menuInventario.php"); ?> <!-- Menu lateral -->
        </div>
    </header>
    <?php require("obtener_equiposDisponibles.php"); ?>
    <!--Contenido-->
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl" id="">
                <h1 class="app-page-title">Equipo de Cómputo</h1>
                <hr class="my-4">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0"></h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#modalequipoNuevo">
                                        Agregar Equipo de cómputo Nuevo
                                    </button>
                                </div>
                                <div class="col-auto">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#modalequipo">
                                        Agregar Equipo de cómputo Compuesto
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal para agregar equipos compuestos-->
                <div class="modal fade" id="modalequipo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Equipo de cómputo</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="equiposModel.php" method="POST">
                                <div class="modal-body">
                                    <div class="col-12 col-md-12">
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">CPU</label>
                                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="cpu" name="cpu" onchange="datocpu();">
                                                    <option>Seleccionar CPU</option>
                                                    <?php
                                                    $consulta = "SELECT * FROM articulos WHERE nombre_art LIKE '%cpu%' and categoria=7 and estado_art=1";
                                                    $resultado = mysqli_query($con, $consulta);
                                                    $contador = 0;
                                                    while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                        $contador++; ?>
                                                        <option value="<?php echo $misdatos["id_art"]; ?>" data-subtext=""><?php echo $misdatos["folio_art"]; ?>-<?php echo $misdatos["nombre_art"]; ?>-<?php echo $misdatos["modelo_art"]; ?>-<?php echo $misdatos["marca_art"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Teclado</label>
                                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="teclado" name="teclado" onchange="datoteclado();">
                                                    <option>Seleccionar Teclado</option>
                                                    <?php
                                                    $consulta = "SELECT * FROM articulos WHERE nombre_art LIKE '%teclado%' and categoria=1 and estado_art=1";
                                                    $resultado = mysqli_query($con, $consulta);
                                                    $contador = 0;
                                                    while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                        $contador++; ?>
                                                        <option value="<?php echo $misdatos["id_art"]; ?>" data-subtext=""><?php echo $misdatos["folio_art"]; ?>-<?php echo $misdatos["nombre_art"]; ?>-<?php echo $misdatos["modelo_art"]; ?>-<?php echo $misdatos["marca_art"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Mouse</label>
                                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="mouse" name="mouse" onchange="datomouse();">
                                                    <option>Seleccionar Mouse</option>
                                                    <?php
                                                    $consulta = "SELECT * FROM articulos WHERE nombre_art LIKE '%mouse%' and categoria=1 and estado_art=1";
                                                    $resultado = mysqli_query($con, $consulta);
                                                    $contador = 0;
                                                    while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                        $contador++; ?>
                                                        <option value="<?php echo $misdatos["id_art"]; ?>" data-subtext=""><?php echo $misdatos["folio_art"]; ?>-<?php echo $misdatos["nombre_art"]; ?>-<?php echo $misdatos["modelo_art"]; ?>-<?php echo $misdatos["marca_art"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Monitor</label>
                                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="monitor" name="monitor" onchange="datomonitor();">
                                                    <option>Seleccionar Monitor</option>
                                                    <?php
                                                    $consulta = "SELECT * FROM articulos WHERE nombre_art LIKE '%monitor%' and categoria=2 and estado_art=1";
                                                    $resultado = mysqli_query($con, $consulta);
                                                    $contador = 0;
                                                    while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                        $contador++; ?>
                                                        <option value="<?php echo $misdatos["id_art"]; ?>" data-subtext=""><?php echo $misdatos["folio_art"]; ?>-<?php echo $misdatos["nombre_art"]; ?>-<?php echo $misdatos["modelo_art"]; ?>-<?php echo $misdatos["marca_art"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Procesador</label>
                                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="procesador" name="procesador" onchange="datoprocesador();">
                                                    <option>Seleccionar procesador</option>
                                                    <?php
                                                    $consulta = "SELECT * FROM articulos WHERE nombre_art LIKE '%procesador%' and categoria=7 and estado_art=1";
                                                    $resultado = mysqli_query($con, $consulta);
                                                    $contador = 0;
                                                    while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                        $contador++; ?>
                                                        <option value="<?php echo $misdatos["id_art"]; ?>" data-subtext=""><?php echo $misdatos["folio_art"]; ?>-<?php echo $misdatos["nombre_art"]; ?>-<?php echo $misdatos["modelo_art"]; ?>-<?php echo $misdatos["marca_art"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Almacenamiento</label>
                                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="almacenamiento" name="almacenamiento" onchange="datoalmacenamiento();">
                                                    <option>Seleccionar disco duro</option>
                                                    <?php
                                                    $consulta = "SELECT * FROM articulos WHERE nombre_art LIKE '%disco%' and categoria=3 and estado_art=1";
                                                    $resultado = mysqli_query($con, $consulta);
                                                    $contador = 0;
                                                    while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                        $contador++; ?>
                                                        <option value="<?php echo $misdatos["id_art"]; ?>" data-subtext=""><?php echo $misdatos["folio_art"]; ?>-<?php echo $misdatos["nombre_art"]; ?>-<?php echo $misdatos["modelo_art"]; ?>-<?php echo $misdatos["marca_art"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-1" class="form-label">RAM<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                    </span></label>
                                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="ram" name="ram" onchange="datoram();">
                                                    <option>Seleccionar memoria RAM</option>
                                                    <?php
                                                    $consulta = "SELECT * FROM articulos WHERE nombre_art LIKE '%ram%' and categoria=3 and estado_art=1";
                                                    $resultado = mysqli_query($con, $consulta);
                                                    $contador = 0;
                                                    while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                        $contador++; ?>
                                                        <option value="<?php echo $misdatos["id_art"]; ?>" data-subtext=""><?php echo $misdatos["folio_art"]; ?>-<?php echo $misdatos["nombre_art"]; ?>-<?php echo $misdatos["modelo_art"]; ?>-<?php echo $misdatos["marca_art"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-1" class="form-label">Especificaciones de softwares<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                    </span></label>
                                                <textarea class="form-control" aria-label="With textarea" id="software" name="software"></textarea>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-1" class="form-label">Dirección IP<span class="ms-2" data-container="body" data-bs-toggle="">
                                                    </span></label>
                                                <input type="text" class="form-control" id="ip" name="ip" required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-1" class="form-label">Ruta<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                    </span></label>
                                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="rutaRed" name="rutaRed" onchange="datorutaRed();">
                                                    <option>Seleccionar ruta de red</option>
                                                    <?php
                                                    $consulta = "SELECT * FROM vista_rutas";
                                                    $resultado = mysqli_query($con, $consulta);
                                                    $contador = 0;
                                                    while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                        $contador++; ?>
                                                        <option value="<?php echo $misdatos["id"]; ?>" data-subtext=""><?php echo $misdatos["nodo"]; ?>-<?php echo $misdatos["parcheo"]; ?>-<?php echo $misdatos["puerto"]; ?>-<?php echo $misdatos["segmento"]; ?>-<?php echo $misdatos["num_segmento"]; ?>-<?php echo $misdatos["vlan"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row justify-content-between">
                                        <div class="col-auto col-6">
                                            <input name="componentes[]" type="hidden" id="id_cpu">
                                            <input name="componentes[]" type="hidden" id="id_teclado">
                                            <input name="componentes[]" type="hidden" id="id_mouse">
                                            <input name="componentes[]" type="hidden" id="id_monitor">
                                            <input name="componentes[]" type="hidden" id="id_procesador">
                                            <input name="componentes[]" type="hidden" id="id_almacenamiento">
                                            <input name="componentes[]" type="hidden" id="id_ram">
                                            <input name="id_rutaRed" type="text" id="id_rutaRed">
                                            <!--<button type="submit" id="btnGuardar" class="btn app-btn-primary">Guardar</button>-->
                                            <button type="submit" class="btn app-btn-primary">Guardar</button>
                                        </div>
                                        <div class="col-auto col-6">
                                            <a class="btn app-btn-secondary" href="#" data-bs-dismiss="modal">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Termina modal de equipo compuesto -->
                <!-- Modal para agregar equipos Nuevo-->
                <div class="modal fade" id="modalequipoNuevo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Equipo de cómputo Nuevo</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="equiposModel2.php" method="POST">
                                <div class="modal-body">
                                    <div class="col-12 col-md-12">
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">CPU</label>
                                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="cpu2" name="cpu2" onchange="datocpu2();">
                                                    <option>Seleccionar CPU</option>
                                                    <?php
                                                    $consulta = "SELECT * FROM articulos WHERE nombre_art LIKE '%cpu%' and categoria=7 and estado_art=1";
                                                    $resultado = mysqli_query($con, $consulta);
                                                    $contador = 0;
                                                    while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                        $contador++; ?>
                                                        <option value="<?php echo $misdatos["id_art"]; ?>" data-subtext=""><?php echo $misdatos["folio_art"]; ?>-<?php echo $misdatos["nombre_art"]; ?>-<?php echo $misdatos["modelo_art"]; ?>-<?php echo $misdatos["marca_art"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Teclado</label>
                                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="teclado2" name="teclado2" onchange="datoteclado2();">
                                                    <option>Seleccionar Teclado</option>
                                                    <?php
                                                    $consulta = "SELECT * FROM articulos WHERE nombre_art LIKE '%teclado%' and categoria=1 and estado_art=1";
                                                    $resultado = mysqli_query($con, $consulta);
                                                    $contador = 0;
                                                    while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                        $contador++; ?>
                                                        <option value="<?php echo $misdatos["id_art"]; ?>" data-subtext=""><?php echo $misdatos["folio_art"]; ?>-<?php echo $misdatos["nombre_art"]; ?>-<?php echo $misdatos["modelo_art"]; ?>-<?php echo $misdatos["marca_art"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Mouse</label>
                                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="mouse2" name="mouse2" onchange="datomouse2();">
                                                    <option>Seleccionar Mouse</option>
                                                    <?php
                                                    $consulta = "SELECT * FROM articulos WHERE nombre_art LIKE '%mouse%' and categoria=1 and estado_art=1";
                                                    $resultado = mysqli_query($con, $consulta);
                                                    $contador = 0;
                                                    while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                        $contador++; ?>
                                                        <option value="<?php echo $misdatos["id_art"]; ?>" data-subtext=""><?php echo $misdatos["folio_art"]; ?>-<?php echo $misdatos["nombre_art"]; ?>-<?php echo $misdatos["modelo_art"]; ?>-<?php echo $misdatos["marca_art"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Monitor</label>
                                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="monitor2" name="monitor2" onchange="datomonitor2();">
                                                    <option>Seleccionar Monitor</option>
                                                    <?php
                                                    $consulta = "SELECT * FROM articulos WHERE nombre_art LIKE '%monitor%' and categoria=2 and estado_art=1";
                                                    $resultado = mysqli_query($con, $consulta);
                                                    $contador = 0;
                                                    while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                        $contador++; ?>
                                                        <option value="<?php echo $misdatos["id_art"]; ?>" data-subtext=""><?php echo $misdatos["folio_art"]; ?>-<?php echo $misdatos["nombre_art"]; ?>-<?php echo $misdatos["modelo_art"]; ?>-<?php echo $misdatos["marca_art"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-1" class="form-label">Especificaciones generales<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                    </span></label>
                                                <textarea class="form-control" aria-label="With textarea" id="software2" name="software2"></textarea>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-1" class="form-label">Dirección IP<span class="ms-2" data-container="body" data-bs-toggle="">
                                                    </span></label>
                                                <input type="text" class="form-control" id="ip2" name="ip2" required>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-1" class="form-label">Ruta<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                    </span></label>
                                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="rutaRed2" name="rutaRed2" onchange="datorutaRed2();">
                                                    <option>Seleccionar ruta de red</option>
                                                    <?php
                                                    $consulta = "SELECT * FROM vista_rutas";
                                                    $resultado = mysqli_query($con, $consulta);
                                                    $contador = 0;
                                                    while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                        $contador++; ?>
                                                        <option value="<?php echo $misdatos["id"]; ?>" data-subtext=""><?php echo $misdatos["nodo"]; ?>-<?php echo $misdatos["parcheo"]; ?>-<?php echo $misdatos["puerto"]; ?>-<?php echo $misdatos["segmento"]; ?>-<?php echo $misdatos["num_segmento"]; ?>-<?php echo $misdatos["vlan"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row justify-content-between">
                                        <div class="col-auto col-6">
                                            <input name="componentes2[]" type="hidden" id="id_cpu2">
                                            <input name="componentes2[]" type="hidden" id="id_teclado2">
                                            <input name="componentes2[]" type="hidden" id="id_mouse2">
                                            <input name="componentes2[]" type="hidden" id="id_monitor2">
                                            <input name="id_rutaRed2" type="hidden" id="id_rutaRed2">
                                            <!--<button type="submit" id="btnGuardar" class="btn app-btn-primary">Guardar</button>-->
                                            <button type="submit" class="btn app-btn-primary">Guardar</button>
                                        </div>
                                        <div class="col-auto col-6">
                                            <a class="btn app-btn-secondary" href="#" data-bs-dismiss="modal">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Termina modal de equipo Nuevo -->


                <!-- Tabla-->
                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Todos los equipos</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Centros de cómputo</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Departamentos</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Otros</a>
                </nav>


                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table id="tabla_disponibles" class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Folio</th>
                                                <th class="cell">Componentes</th>
                                                <th class="cell">Especificaciones</th>
                                                <th class="cell">IP</th>
                                                <th class="cell">Estado</th>
                                                <th class="cell">Código QR</th>
                                                <th class="cell">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            getEquiposDisponibles();
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                        <div class="app-card app-card-orders-table mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table id="tabla_equiposOcupados" class="table mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Folio</th>
                                                <th class="cell">Componentes</th>
                                                <th class="cell">Especificaciones</th>
                                                <th class="cell">IP</th>
                                                <th class="cell">Ubicación</th>
                                                <th class="cell">Persona asignada</th>
                                                <th class="cell">Estado</th>
                                                <th class="cell">Opciones</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
                        <div class="app-card app-card-orders-table mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Order</th>
                                                <th class="cell">Product</th>
                                                <th class="cell">Customer</th>
                                                <th class="cell">Date</th>
                                                <th class="cell">Status</th>
                                                <th class="cell">Total</th>
                                                <th class="cell"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="cell">#15345</td>
                                                <td class="cell"><span class="truncate">Consectetur adipiscing elit</span></td>
                                                <td class="cell">Dylan Ambrose</td>
                                                <td class="cell"><span class="cell-data">16 Oct</span><span class="note">03:16 AM</span>
                                                </td>
                                                <td class="cell"><span class="badge bg-warning">Pending</span></td>
                                                <td class="cell">$96.20</td>
                                                <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="orders-cancelled" role="tabpanel" aria-labelledby="orders-cancelled-tab">
                        <div class="app-card app-card-orders-table mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Order</th>
                                                <th class="cell">Product</th>
                                                <th class="cell">Customer</th>
                                                <th class="cell">Date</th>
                                                <th class="cell">Status</th>
                                                <th class="cell">Total</th>
                                                <th class="cell"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td class="cell">#15342</td>
                                                <td class="cell"><span class="truncate">Justo feugiat neque</span></td>
                                                <td class="cell">Reina Brooks</td>
                                                <td class="cell"><span class="cell-data">12 Oct</span><span class="note">04:23 PM</span>
                                                </td>
                                                <td class="cell"><span class="badge bg-danger">Cancelled</span></td>
                                                <td class="cell">$59.00</td>
                                                <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="equiposController1.js"></script>

    <!-- Javascript -->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/chart.js/chart.min.js"></script>
    <script src="../../assets/js/app.js"></script>

    <!-- sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../js/sweetAlert.js"></script>
    <script src="agregarEquipo.js"></script>
    <!--LIBRERIA QR-->
    <script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>

    <script type="text/javascript">
        function verQr(folio) {
            const $imagen = document.querySelector("#codigo"),
                $boton = document.querySelector("#btnDescargar");
            new QRious({
                element: $imagen,
                value: folio, // La URL o el texto
                size: 150,
                backgroundAlpha: 1, // 0 para fondo transparente
                foreground: "#000", // Color del QR
                level: "H", // Puede ser L,M,Q y H (L es el de menor nivel, H el mayor)
            });
            $boton.onclick = () => {
                const enlace = document.createElement("a");
                enlace.href = $imagen.src;
                enlace.download = "Folio EC.jpg";
                enlace.click();
            }
        }
    </script>
</body>

</html>