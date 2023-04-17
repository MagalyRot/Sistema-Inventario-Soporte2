<!DOCTYPE html>
<html lang="en">

<head>
    <title>Préstamos</title>
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
    <?php require("articulosModel.php"); ?>
    <!--Contenido-->
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl" id="">
                <h1 class="app-page-title">Préstamos</h1>

                <!-- Tabla-->
                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Préstamos temporales</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Préstamos permanentes</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Préstamos finalizados</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="table-cancel-tab" data-bs-toggle="tab" href="#table-cancel" role="tab" aria-controls="table-cancel" aria-selected="false">Préstamos cancelados</a>
                </nav>
                <!-- TABLA DE PRÉSTAMOS TEMPORALES -->
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <!-- <div class="table-responsive"> -->
                                    <table id="tabla_temporales" class="table app-table-hover mb-0 display nowrap text-left"  cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="cell">Folio</th>
                                                <th class="cell">Articulos</th>
                                                <th class="cell">Equipos</th>
                                                <th class="cell">Solicitante</th>
                                                <th class="cell">Personal</th>
                                                <th class="cell">Fecha inicio</th>
                                                <th class="cell">F. estimada entrega</th>
                                                <th class="cell">Ubicación</th>
                                                <th class="cell">Estado</th>
                                                <th class="cell"></th>
                                                <th class="cell"></th>
                                            </tr>
                                        </thead>
                                    </table>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- TABLA DE PRÉSTAMOS PERMANENTES -->
                    <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                        <div class="app-card app-card-orders-table shadow-sm  mb-5">
                            <div class="app-card-body">
                                <!-- <div class="table-responsive"> -->
                                    <table id="tabla_permanentes" class="table app-table-hover mb-0 display nowrap text-left"  cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="cell">Folio</th>
                                                <th class="cell">Articulos</th>
                                                <th class="cell">Equipos</th>
                                                <th class="cell">Fecha inicio</th>
                                                <th class="cell">Solicitante</th>
                                                <th class="cell">Personal</th>
                                                <th class="cell">Ubicación</th>
                                                <th class="cell">Estado</th>
                                                <th class="cell"></th>
                                                <th class="cell"></th>
                                            </tr>
                                        </thead>
                                    </table>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- TABLA DE PRÉSTAMOS FINALIZADOS -->
                    <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
                        <div class="app-card app-card-orders-table shadow-sm  mb-5">
                            <div class="app-card-body">
                                <!-- <div class="table-responsive"> -->
                                    <table id="tabla_finalizados" class="table app-table-hover mb-0 display nowrap text-left"  cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="cell">Folio</th>
                                                <th class="cell">Articulos</th>
                                                <th class="cell">Equipos</th>
                                                <th class="cell">Solicitante</th>
                                                <th class="cell">Personal</th>
                                                <th class="cell">Fecha inicio</th>
                                                <th class="cell">F. estimada entrega</th>
                                                <th class="cell">Fecha finalizada</th>
                                                <th class="cell">Ubicación</th>
                                                <th class="cell">Tipo</th>
                                                <th class="cell">Estado</th>
                                            </tr>
                                        </thead>
                                    </table>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- TABLA DE PRÉSTAMOS CANCELADOS -->
                    <div class="tab-pane fade" id="table-cancel" role="tabpanel" aria-labelledby="orders-pending-tab">
                        <div class="app-card app-card-orders-table shadow-sm  mb-5">
                            <div class="app-card-body">
                                <!-- <div class="table-responsive"> -->
                                    <table id="tabla_cancelados" class="table app-table-hover mb-0 display nowrap text-left"  cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="cell">Folio</th>
                                                <th class="cell">Articulos</th>
                                                <th class="cell">Equipos</th>
                                                <th class="cell">Solicitante</th>
                                                <th class="cell">Personal</th>
                                                <th class="cell">Fecha inicio</th>
                                                <th class="cell">Ubicación</th>
                                                <th class="cell">Tipo</th>
                                                <th class="cell">Estado</th>
                                            </tr>
                                        </thead>
                                    </table>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- SCRIPT PARA OBTENER LOS ARTICULOS -->
                <!-- Modal Mostrar articulos-->
                <div class="modal fade" id="modalComponentes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Componentes</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-between">

                                    <div class="app-card app-card-orders-table mb-5">
                                        <div class="app-card-body">
                                            <div class="table-responsive">
                                                <table class="table mb-0 text-left table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="cell">Folio</th>
                                                            <th class="cell">Componente</th>
                                                            <th class="cell">Modelo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="Componentes">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="row justify-content-between">
                                    <div class="col-auto col-6">
                                        <a class="btn app-btn-secondary" href="#" data-bs-dismiss="modal">Cerrar</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--Termina modal de mostrar artículos-->

                <!-- Modal Mostrar Equipos-->
                <div class="modal fade" id="modalEquipos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Equipos de cómputo</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-between">
                                    <div class="app-card app-card-orders-table mb-5">
                                        <div class="app-card-body">
                                            <div class="table-responsive">
                                                <table class="table mb-0 text-left table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="cell">Folio</th>
                                                            <th class="cell">Especificaciones</th>
                                                            <th class="cell">IP</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="Equipos">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="row justify-content-between">
                                    <div class="col-auto col-6">
                                        <a class="btn app-btn-secondary" href="#" data-bs-dismiss="modal">Cerrar</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--Termina modal de mostrar Equipos-->

                <!-- Modal Mostrar Equipos-->
                <div class="modal fade" id="modalPersonal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Personal</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-between">

                                    <div class="app-card app-card-orders-table mb-5">
                                        <div class="app-card-body">
                                            <div class="table-responsive">
                                                <table class="table mb-0 text-left table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="cell">Num. Trabajador</th>
                                                            <th class="cell">Nombre completo</th>
                                                            <th class="cell">Tipo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="Personal">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="row justify-content-between">
                                    <div class="col-auto col-6">
                                        <a class="btn app-btn-secondary" href="#" data-bs-dismiss="modal">Cerrar</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--Termina modal de mostrar Equipos-->
            </div>
        </div>
    </div>

    <!-- SCRIPT PARA OBTENER LOS ARTICULOS -->
    <script src="../../assets/plugins/popper.min.js"></script>

    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="finalizarPrestamoController.js"></script>

    <!-- Javascript -->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/chart.js/chart.min.js"></script>
    <script src="../../assets/js/app.js"></script>

    <!-- sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../js/sweetAlert.js"></script>

</body>

</html>