<?php
session_start();
if (!isset($_SESSION["carritoArticulos"])) $_SESSION["carritoArticulos"] = [];
if (!isset($_SESSION["carritoEquipos"])) $_SESSION["carritoEquipos"] = [];
if (!isset($_SESSION["carritoArticulos2"])) $_SESSION["carritoArticulos2"] = [];
if (!isset($_SESSION["carritoEquipos2"])) $_SESSION["carritoEquipos2"] = [];

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
    <!--BOOSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="../../assets/bootstrapSelect/bootstrap-select.min.js"></script>
    <!--ICONS BOOSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/prestamo.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/sistemaIS.css">
    <script defer src="../../assets/plugins/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css">
    <!-- Extension responsiva-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.css">
</head>
<body class="app">
    <!-- mostrar manita del cursor-->
    <style type="text/css">
        li {
            cursor: pointer;
        }

        .dropdown-menu .dropdown-item.active,
        .dropdown-menu .dropdown-item:active {
            background: #ffc107;
        }
    </style>
    <header class="app-header fixed-top">
        <?php require("navbarInventario.php"); ?><!-- Navbar -->
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <?php require("menuInventario.php"); ?> <!-- Menu lateral -->
        </div>
    </header>
    <?php require("prestamosModel.php"); ?>

    <!--Contenido-->
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl" id="">
                <h1 class="app-page-title">Préstamos</h1>
                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Préstamo temporal</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Préstamo permanente</a>
                </nav>

                <!-- ************************************APARTADOS TABS***************************************************************+" -->
                <div class="tab-content" id="orders-table-tab-content">
                    <!-- *************************************** INICIA APARTADO "PRÉSTAMO TEMPORAL ************************************************************+" -->
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <br>
                                <!--INICIA EL APARTADO DE LISTADO DE ARTICULOS A SOLICITAR-->
                                <h5 class="section-title">Listado de artículos a solicitar</h5>
                                <div class="col-12 col-md-12">
                                    <div class="app-card app-card-settings shadow-sm p-4">
                                        <div class="app-card-body">
                                            <div class="col-xs-12">
                                                <!-- validación para buscar y agregar artículos al carrito-->
                                                <?php
                                                if (isset($_GET["status1"])) {
                                                    if ($_GET["status1"] === "1") {
                                                ?>
                                                        <div class="alert alert-success">
                                                            <strong>¡Correcto!</strong> Venta realizada correctamente
                                                        </div>
                                                    <?php
                                                    } else if ($_GET["status1"] === "2") {
                                                    ?>
                                                        <div class="alert alert-info">
                                                            <strong>Venta cancelada</strong>
                                                        </div>
                                                    <?php
                                                    } else if ($_GET["status1"] === "3") {
                                                    } else if ($_GET["status1"] === "7") {
                                                    ?>
                                                        <div class="alert alert-danger">
                                                            <strong><i class="bi bi-x-octagon"></i> </strong>El producto no existe
                                                        </div>
                                                    <?php
                                                    } else if ($_GET["status1"] === "8") {

                                                    ?>
                                                        <div class="alert alert-danger">
                                                            <strong><i class="bi bi-x-octagon"></i></strong>El producto está agotado
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="alert alert-danger">
                                                            <strong>Error:</strong> Algo salió mal mientras se realizaba la venta
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!-- termina validación de artículos -->
                                                <form method="post" action="carritoArticulos.php">
                                                    <input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Ingrese el folio del artículo">
                                                </form>
                                                <br>
                                                <div class="tab-content" id="orders-table-tab-content">
                                                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                                                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                                                            <div class="app-card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table app-table-hover mb-0 text-left">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Folio</th>
                                                                                <th>Nombre</th>
                                                                                <th>Descripcion</th>
                                                                                <th>Eliminar</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach ($_SESSION["carritoArticulos"] as $indice => $articulo) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td><?php echo $articulo->id_art ?></td>
                                                                                    <td><?php echo $articulo->folio_art ?></td>
                                                                                    <td><?php echo $articulo->nombre_art ?></td>
                                                                                    <td><?php echo $articulo->descripcion_art ?></td>
                                                                                    <td><a class="btn btn-danger" href="<?php echo "quitarArticulos.php?indice=" . $indice ?>"><i class="fa fa-trash"></i></a></td>
                                                                                </tr>
                                                                            <?php } ?>
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
                                    <!-- TERMINA EL APARTADO DE LISTADO DE ARTICULOS A SOLICITAR -->
                                    <br>
                                    <!--INICIA EL APARTADO DE LISTADO DE EQUIPOS A SOLICITAR-->
                                    <p>Listado de equipos de cómputo a solicitar</p>
                                    <div class="col-12 col-md-12">
                                        <div class="app-card app-card-settings shadow-sm p-4">
                                            <div class="app-card-body">
                                                <div class="col-xs-12">
                                                    <?php
                                                    if (isset($_GET["status"])) {
                                                        if ($_GET["status"] === "1") {
                                                    ?>
                                                            <div class="alert alert-success">
                                                                <strong>¡Correcto!</strong> Venta realizada correctamente
                                                            </div>
                                                        <?php

                                                        } else if ($_GET["status"] === "2") {
                                                        ?>
                                                            <div class="alert alert-info">
                                                                <strong>Venta cancelada</strong>
                                                            </div>
                                                        <?php
                                                        } else if ($_GET["status"] === "3") {
                                                        } else if ($_GET["status"] === "4") {
                                                        ?>
                                                            <div class="alert alert-danger">
                                                                <strong>Error: </strong>El equipo de cómputo no existe, verifica el folio
                                                            </div>
                                                        <?php
                                                        } else if ($_GET["status"] === "5") {
                                                        ?>
                                                            <div class="alert alert-danger">
                                                                <strong>Error: </strong>El equipo de cómputo no está disponible
                                                            </div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <div class="alert alert-danger">
                                                                <strong>Error:</strong> Algo salió mal mientras se realizaba la búsqueda
                                                            </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    <form method="post" action="carritoEquipos.php">
                                                        <input autocomplete="off" autofocus class="form-control" name="codigo2" required type="text" id="codigo2" placeholder="Ingrese el folio del artículo">
                                                    </form>
                                                    <br>
                                                    <div class="tab-content" id="orders-table-tab-content">
                                                        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                                                            <div class="app-card app-card-orders-table shadow-sm mb-5">
                                                                <div class="app-card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table app-table-hover mb-0 text-left">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>ID</th>
                                                                                    <th>Folio</th>
                                                                                    <th>IP</th>
                                                                                    <th>Ruta de Red</th>
                                                                                    <th>Descripción</th>
                                                                                    <th>Eliminar</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach ($_SESSION["carritoEquipos"] as $indice => $equipos) {

                                                                                ?>
                                                                                    <tr>
                                                                                        <td><?php echo $equipos->id_eqc ?></td>
                                                                                        <td><?php echo $equipos->folio_eqc ?></td>
                                                                                        <td><?php echo $equipos->ip_eqc ?></td>
                                                                                        <td><?php echo $equipos->rutaRed_eqc ?></td>
                                                                                        <td><?php echo $equipos->descripcion_eqc ?></td>
                                                                                        <td><a class="btn btn-danger" href="<?php echo "quitarEquipos.php?indice=" . $indice ?>"><i class="fa fa-trash"></i></a></td>
                                                                                    </tr>
                                                                                <?php } ?>
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
                                    </div>
                                    <!-- TERMINA EL APARTADO DE LISTADO DE EQUIPOS A SOLICITAR -->

                                    <!-- Apartado para la información del solicitante y detalles del préstamo-->
                                    <hr class="mb-4">
                                    <h5>Datos del solicitante</h5>
                                    <div class="row g-4 settings-section">
                                        <div class="col-12 col-md-6">
                                            <div class="app-card app-card-settings shadow-sm p-4">
                                                <div class="app-card-body">
                                                    <div class="mb-3">
                                                        <label for="setting-input-1" class="">Nombre del solicitante<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                        </label>
                                                        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="administrativo" name="administrativo" onchange="Datosadministrativo(event.target.value);">
                                                            <option value="VACIO" disabled="" selected="">Seleccionar Administrativo</option>
                                                            <?php
                                                            $consulta = "SELECT id_per,ntrabajador_per,concat_ws(' ', nombre_per,apellidoP_per,apellidoM_per) as nombre FROM personal WHERE tipo_per=1 and estado_per=1";
                                                            $resultado = mysqli_query($con, $consulta);
                                                            $contador = 0;
                                                            while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                                $contador++; ?>
                                                                <option data-subtext="<?php echo $misdatos["id_per"]; ?>"><?php echo $misdatos["id_per"]; ?>-<?php echo $misdatos["ntrabajador_per"]; ?>-<?php echo $misdatos["nombre"]; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="setting-input-1" class="">Ubicación<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                        </label>
                                                        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="ubicacion" name="ubicacion" onchange="ShowSelected();">
                                                            <option>Seleccionar Ubicación</option>
                                                            <?php
                                                            $consulta = "SELECT * FROM ubicaciones";
                                                            $resultado = mysqli_query($con, $consulta);
                                                            $contador = 0;
                                                            while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                                $contador++; ?>
                                                                <option value="<?php echo $misdatos["id_ubi"]; ?>" data-subtext=""><?php echo $misdatos["edificio_ubi"]; ?>-Piso<?php echo $misdatos["piso_ubi"]; ?>-Aula <?php echo $misdatos["aula_ubi"]; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="app-card app-card-settings shadow-sm p-4">
                                                <div class="app-card-body">

                                                    <div class="row justify-content-between">
                                                        <div class="mb-3">
                                                            <label for="setting-input-1" class="">Estimada de entrega<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                            </label>
                                                            <input type="date" class="form-control" id="fecha" name="fecha" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-between">
                                                        <div class="col-auto">
                                                        </div>
                                                        <div class="col-auto">
                                                            <button class="btn app-btn-primary" onclick="getValueInput()"><i class="bi bi-check-circle"></i></button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-12 col-md-12">
                                        <div class="app-card app-card-settings shadow-sm p-4">
                                            <div class="app-card-body">

                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                        <h5 class="section-title">Datos del solicitante</h5><br>
                                                        <div class="mb-2"><strong>Departamento:</strong> <span class="badge bg-success">Sistemas y Computación</span></div>
                                                        <div class="mb-2"><strong>Número de trabajador:</strong> <label id="numeroT"></label></div>
                                                        <div class="mb-2"><strong>Nombre solicitante:</strong> <label id="nombrePersona"></label></div>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h5 class="section-title">Datos del servicio</h5><br>
                                                        <div class="mb-2"><strong>Tipo de Préstamo:</strong> <span class="badge bg-success">Temporal</span></div>
                                                        <div class="mb-2"><strong>Estimado de entrega:</strong> <label id="valueInput"></label></div>
                                                        <div class="mb-2"><strong>Ubicación:</strong> <label id="ubi"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <div class="row justify-content-between">
                                                            <form action="finalizarPrestamoTemporal.php" method="POST">
                                                                <div class="col-auto">
                                                                 <input name="idTrabajador" type="hidden" id="idTrabajador">
                                                                 <input name="fechaEntrega" type="hidden" id="fechaEntrega">
                                                                 <input name="id_ubicacion" type="hidden" id="id_ubicacion">
                                                                    <button type="submit" class="btn app-btn-primary">Confirmar préstamo</button>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <a href=" " class="btn app-btn-secondary">Cancelar</a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- *************************************** TERMINA APARTADO "PRÉSTAMO TEMPORAL ************************************************************+" -->

                    <!-- *************************************** INICIA APARTADO "PRÉSTAMO PERMANENTE ************************************************************+" -->
                    <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                        <div class="app-card app-card-orders-table mb-5">
                            <div class="app-card-body">
                                <!--INICIA EL APARTADO DE LISTADO DE ARTICULOS A SOLICITAR-->
                                <h5 class="section-title">Listado de artículos a solicitar</h5>
                                <div class="col-12 col-md-12">
                                    <div class="app-card app-card-settings shadow-sm p-4">
                                        <div class="app-card-body">
                                            <div class="col-xs-12">
                                                <!-- validación para buscar y agregar artículos al carrito-->
                                                <?php
                                                if (isset($_GET["status2"])) {
                                                    if ($_GET["status2"] === "1") {
                                                ?>
                                                        <div class="alert alert-success">
                                                            <strong>¡Correcto!</strong> Venta realizada correctamente
                                                        </div>
                                                    <?php
                                                    } else if ($_GET["status2"] === "2") {
                                                    ?>
                                                        <div class="alert alert-info">
                                                            <strong>Venta cancelada</strong>
                                                        </div>
                                                    <?php
                                                    } else if ($_GET["status2"] === "3") {
                                                    } else if ($_GET["status2"] === "7") {
                                                    ?>
                                                        <div class="alert alert-danger">
                                                            <strong><i class="bi bi-x-octagon"></i> </strong>El producto no existe
                                                        </div>
                                                    <?php
                                                    } else if ($_GET["status2"] === "8") {

                                                    ?>
                                                        <div class="alert alert-danger">
                                                            <strong><i class="bi bi-x-octagon"></i></strong>El producto está agotado
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="alert alert-danger">
                                                            <strong>Error:</strong> Algo salió mal mientras se realizaba la venta
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!-- termina validación de artículos -->
                                                <form method="post" action="carritoArticulos2.php">
                                                    <input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Ingrese el folio del artículo">
                                                </form>
                                                <br>
                                                <div class="tab-content" id="orders-table-tab-content">
                                                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                                                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                                                            <div class="app-card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table app-table-hover mb-0 text-left">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Folio</th>
                                                                                <th>Nombre</th>
                                                                                <th>Descripcion</th>
                                                                                <th>Eliminar</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach ($_SESSION["carritoArticulos2"] as $indice => $articulo) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td><?php echo $articulo->id_art ?></td>
                                                                                    <td><?php echo $articulo->folio_art ?></td>
                                                                                    <td><?php echo $articulo->nombre_art ?></td>
                                                                                    <td><?php echo $articulo->descripcion_art ?></td>
                                                                                    <td><a class="btn btn-danger" href="<?php echo "quitarArticulos2.php?indice=" . $indice ?>"><i class="fa fa-trash"></i></a></td>
                                                                                </tr>
                                                                            <?php } ?>
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
                                    <!-- TERMINA EL APARTADO DE LISTADO DE ARTICULOS A SOLICITAR -->
                                    <br>
                                    <!--INICIA EL APARTADO DE LISTADO DE EQUIPOS A SOLICITAR-->
                                    <p>Listado de equipos de cómputo a solicitar</p>
                                    <div class="col-12 col-md-12">
                                        <div class="app-card app-card-settings shadow-sm p-4">
                                            <div class="app-card-body">
                                                <div class="col-xs-12">
                                                    <?php
                                                    if (isset($_GET["status3"])) {
                                                        if ($_GET["status3"] === "1") {
                                                    ?>
                                                            <div class="alert alert-success">
                                                                <strong>¡Correcto!</strong> Venta realizada correctamente
                                                            </div>
                                                        <?php

                                                        } else if ($_GET["status3"] === "2") {
                                                        ?>
                                                            <div class="alert alert-info">
                                                                <strong>Venta cancelada</strong>
                                                            </div>
                                                        <?php
                                                        } else if ($_GET["status3"] === "3") {
                                                        } else if ($_GET["status3"] === "4") {
                                                        ?>
                                                            <div class="alert alert-danger">
                                                                <strong>Error: </strong>El equipo de cómputo no existe, verifica el folio
                                                            </div>
                                                        <?php
                                                        } else if ($_GET["status3"] === "5") {
                                                        ?>
                                                            <div class="alert alert-danger">
                                                                <strong>Error: </strong>El equipo de cómputo no está disponible
                                                            </div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <div class="alert alert-danger">
                                                                <strong>Error:</strong> Algo salió mal mientras se realizaba la búsqueda
                                                            </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    <form method="post" action="carritoEquipos2.php">
                                                        <input autocomplete="off" autofocus class="form-control" name="codigo2" required type="text" id="codigo2" placeholder="Ingrese el folio del artículo">
                                                    </form>
                                                    <br>
                                                    <div class="tab-content" id="orders-table-tab-content">
                                                        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                                                            <div class="app-card app-card-orders-table shadow-sm mb-5">
                                                                <div class="app-card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table app-table-hover mb-0 text-left">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>ID</th>
                                                                                    <th>Folio</th>
                                                                                    <th>IP</th>
                                                                                    <th>Ruta de Red</th>
                                                                                    <th>Descripción</th>
                                                                                    <th>Eliminar</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach ($_SESSION["carritoEquipos2"] as $indice => $equipos) {

                                                                                ?>
                                                                                    <tr>
                                                                                        <td><?php echo $equipos->id_eqc ?></td>
                                                                                        <td><?php echo $equipos->folio_eqc ?></td>
                                                                                        <td><?php echo $equipos->ip_eqc ?></td>
                                                                                        <td><?php echo $equipos->rutaRed_eqc ?></td>
                                                                                        <td><?php echo $equipos->descripcion_eqc ?></td>
                                                                                        <td><a class="btn btn-danger" href="<?php echo "quitarEquipos2.php?indice=" . $indice ?>"><i class="fa fa-trash"></i></a></td>
                                                                                    </tr>
                                                                                <?php } ?>
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
                                    </div>
                                    <!-- TERMINA EL APARTADO DE LISTADO DE EQUIPOS A SOLICITAR -->

                                    <!-- Apartado para la información del solicitante y detalles del préstamo-->
                                    <hr class="mb-4">
                                    <h5>Datos del solicitante</h5>
                                    <div class="row g-4 settings-section">
                                        <div class="col-12 col-md-6">
                                            <div class="app-card app-card-settings shadow-sm p-4">
                                                <div class="app-card-body">
                                                    <div class="mb-3">
                                                        <label for="setting-input-1" class="">Nombre del solicitante<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                        </label>
                                                        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="administrativo2" name="administrativo2" onchange="Datosadministrativo2(event.target.value);">
                                                            <option value="VACIO" disabled="" selected="">Seleccionar Administrativo</option>
                                                            <?php
                                                            $consulta = "SELECT id_per,ntrabajador_per,concat_ws(' ', nombre_per,apellidoP_per,apellidoM_per) as nombre FROM personal WHERE tipo_per=1 and estado_per=1";
                                                            $resultado = mysqli_query($con, $consulta);
                                                            $contador = 0;
                                                            while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                                $contador++; ?>
                                                                <option data-subtext="<?php echo $misdatos["id_per"]; ?>"><?php echo $misdatos["id_per"]; ?>-<?php echo $misdatos["ntrabajador_per"]; ?>-<?php echo $misdatos["nombre"]; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="app-card app-card-settings shadow-sm p-4">
                                                <div class="app-card-body">
                                                    <div class="row justify-content-between">
                                                    <div class="mb-3">
                                                        <label for="setting-input-1" class="">Ubicación<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                        </label>
                                                        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="ubicacion2" name="ubicacion2" onchange="ShowSelected2();">
                                                            <option>Seleccionar Ubicación</option>
                                                            <?php
                                                            $consulta = "SELECT * FROM ubicaciones";
                                                            $resultado = mysqli_query($con, $consulta);
                                                            $contador = 0;
                                                            while ($misdatos = mysqli_fetch_assoc($resultado)) {
                                                                $contador++; ?>
                                                                <option value="<?php echo $misdatos["id_ubi"]; ?>" data-subtext=""><?php echo $misdatos["edificio_ubi"]; ?>-Piso<?php echo $misdatos["piso_ubi"]; ?>-Aula <?php echo $misdatos["aula_ubi"]; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-12 col-md-12">
                                        <div class="app-card app-card-settings shadow-sm p-4">
                                            <div class="app-card-body">
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                        <h5 class="section-title">Datos del solicitante</h5><br>
                                                        <div class="mb-2"><strong>Departamento:</strong> <span class="badge bg-success">Sistemas y Computación</span></div>
                                                        <div class="mb-2"><strong>Número de trabajador:</strong> <label id="numeroT2"></label></div>
                                                        <div class="mb-2"><strong>Nombre solicitante:</strong> <label id="nombrePersona2"></label></div>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h5 class="section-title">Datos del servicio</h5><br>
                                                        <div class="mb-2"><strong>Tipo de Préstamo:</strong> <span class="badge bg-success">Permanente</span></div>
                                                        <div class="mb-2"><strong>Estimado de entrega:</strong> <label id="valueInput2"></label></div>
                                                        <div class="mb-2"><strong>Ubicación:</strong> <label id="ubi2"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <div class="row justify-content-between">
                                                            <form action="finalizarPrestamoPermanente.php" method="POST">
                                                                <div class="col-auto">
                                                                 <input name="idTrabajador2" type="hidden" id="idTrabajador2">
                                                                 <input name="id_ubicacion2" type="hidden" id="id_ubicacion2">
                                                                    <button type="submit" class="btn app-btn-primary">Confirmar préstamo</button>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <a href=" " class="btn app-btn-secondary">Cancelar</a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- *************************************** TERMINA APARTADO "PRÉSTAMO PERMANENTE" ************************************************************+" -->
                </div>
                <br>
                
            </div>
        </div>
        <!-- Javascript -->
        <script src="//code.jquery.com/jquery-3.5.1.js"></script>
        <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script src="../../assets/plugins/chart.js/chart.min.js"></script>
        <script src="../../assets/js/app.js"></script>
        <!-- Javascript -->
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

        <!--Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../../js/sweetAlert.js"></script>
        <script src="../../js/prestamo.js"></script>

        <script src="ubicacion.js"></script>



</body>

</html>