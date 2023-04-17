<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="">

    <link id="theme-style" rel="stylesheet" href="../../assets/css/sistemaIS.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <script defer src="../../assets/plugins/fontawesome/js/all.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css">
    <!-- Extension responsiva-->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.css">

</head>

<body class="app">
    <header class="app-header fixed-top">
        <?php require("navbarUsuarios.php");?>
        <!-- Navbar -->
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <?php require("menuUsuarios.php");?>
            <!-- Menu lateral -->
        </div>
    </header>

    <!--Contenido-->
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl" id="">
                <h1 class="app-page-title">Usuarios</h1>
                <hr class="mb-4">
                <!-- Tabla-->
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0"></h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">

                                </div>
                                <div class="col-auto">
                                    <button id="limpiarCampos" type="button" class="btn app-btn-secondary"
                                        data-bs-toggle="modal" data-bs-target="#modalCrearAdministrativo">
                                        Agregar Administrativo
                                    </button>
                                </div>
                                <div class="col-auto">
                                    <button id="limpiarCampos2" type="button" class="btn app-btn-secondary"
                                        data-bs-toggle="modal" data-bs-target="#modalCrearPersonal">
                                        Agregar Personal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <nav id="orders-table-tab"
                    class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab"
                        href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Todos los
                        usuarios</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
                        href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Personal</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab"
                        href="#orders-pending" role="tab" aria-controls="orders-pending"
                        aria-selected="false">Administrativo</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab"
                        href="#orders-cancelled" role="tab" aria-controls="orders-cancelled"
                        aria-selected="false">Inactivos</a>
                </nav>


                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel"
                        aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="">
                                    <table id="datos_usuarios" class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Nombre</th>
                                                <th class="cell">Apellido Paterno</th>
                                                <th class="cell">Apellido Materno</th>
                                                <th class="cell">N. Trabajador</th>
                                                <th class="cell">Tipo</th>
                                                <th class="cell">Área Personal</th>
                                                <th class="cell">Estado Personal</th>
                                                <th class="cell">Opciones</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="">
                                    <table id="datos_personal" class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Nombre</th>
                                                <th class="cell">Apellido Paterno</th>
                                                <th class="cell">Apellido Materno</th>
                                                <th class="cell">N. Trabajador</th>
                                                <th class="cell">Tipo</th>
                                                <th class="cell">Área Personal</th>
                                                <th class="cell">Estado Personal</th>
                                                <th class="cell">Opciones</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show " id="orders-pending" role="tabpanel"
                        aria-labelledby="orders-pending-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="">
                                    <table id="datos_administrativos" class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Nombre</th>
                                                <th class="cell">Apellido Paterno</th>
                                                <th class="cell">Apellido Materno</th>
                                                <th class="cell">N. Trabajador</th>
                                                <th class="cell">Tipo</th>
                                                <th class="cell">Área Personal</th>
                                                <th class="cell">Estado Personal</th>
                                                <th class="cell">Opciones</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="orders-cancelled" role="tabpanel"
                        aria-labelledby="orders-cancelled-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="">
                                    <table id="datos_inactivos" class="table mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Nombre</th>
                                                <th class="cell">Apellido Paterno</th>
                                                <th class="cell">Apellido Materno</th>
                                                <th class="cell">N. Trabajador</th>
                                                <th class="cell">Tipo</th>
                                                <th class="cell">Área Personal</th>
                                                <th class="cell">Estado Personal</th>
                                                <th class="cell">Opciones</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--******************************************************************************************************-->
    <!-- MODAL AGREGAR USUARIO ADMINISTRATIVO-->
    <div class="modal fade" id="modalCrearAdministrativo" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Usuario administrativo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">


                    <div class="col-12 col-md-12    ">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form id="formAdministrativos" class="settings-form">
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="addnombre_ad"
                                                placeholder="Nombre">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="formGroupExampleInput3" class="form-label">Apellido
                                                paterno</label>
                                            <input type="text" class="form-control" id="addapellidoP_ad"
                                                placeholder="Apellido Paterno">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                            <label for="formGroupExampleInput4" class="form-label">Apellido
                                                Materno</label>
                                            <input type="text" class="form-control" id="addapellidoM_ad"
                                                placeholder="Apellido materno">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">N. Trabajador</label>
                                            <input type="text" class="form-control" id="addnTrabajador_ad"
                                                placeholder="N. Trabajador">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-12 mb-3">
                                            <label for="setting-input-2" class="form-label">Área</label>

                                            <select class="form-select" name="addarea_ad" id="addarea_ad">
                                                <!--<option selected>Selecciona...</option>-->
                                                <?php
                                                include("../../Controlador/conect.php");
                                                $conn = mysqli_connect($db_host, $db_username, $db_password ,$db_name);

                                                $query_areas="SELECT * FROM areas";
                                                if ($resultado = mysqli_query($conn, $query_areas)) {
                                                /* obtener array asociativo */
                                                while ($row = mysqli_fetch_assoc($resultado)) {
                                                    echo '<option value="'.$row["id_are"].'">'.$row["area_are"].'</option>';
                                                }
                                                /* liberar el conjunto de resultados */
                                                mysqli_free_result($resultado);
                                                }
                                                echo "<br>";
                                            ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <div class="row justify-content-between">
                                            <div class="col-auto col-6">
                                                <button type="submit" class="btn app-btn-primary"> Registrar</button>
                                            </div>
                                            <div class="col-auto col-6">
                                                <a class="btn app-btn-secondary" href="#"
                                                    data-bs-dismiss="modal">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

    <!-- MODAL EDITAR ADMINISTRATIVO-->
    <div class="modal fade" id="modalEditarAdministrativo" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title3 fs-5" id="staticBackdropLabel">Agregar Usuario administrativo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">


                    <div class="col-12 col-md-12    ">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form id="formEditarAdministrativos" class="settings-form">
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                            <input id="id" type="hidden" name="id">
                                            <label for="formGroupExampleInput" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="addnombre_ed"
                                                placeholder="Nombre">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="formGroupExampleInput3" class="form-label">Apellido
                                                paterno</label>
                                            <input type="text" class="form-control" id="addapellidoP_ed"
                                                placeholder="Apellido Paterno">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                            <label for="formGroupExampleInput4" class="form-label">Apellido
                                                Materno</label>
                                            <input type="text" class="form-control" id="addapellidoM_ed"
                                                placeholder="Apellido materno">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">N. Trabajador</label>
                                            <input type="text" class="form-control" id="addnTrabajador_ed"
                                                placeholder="N. Trabajador">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-12 mb-3">
                                            <label for="setting-input-2" class="form-label">Área</label>

                                            <select class="form-select" name="addarea_ed" id="addarea_ed">
                                                <!--<option selected>Selecciona...</option>-->
                                                <?php
                                                include("../../Controlador/conect.php");
                                                $conn = mysqli_connect($db_host, $db_username, $db_password ,$db_name);

                                                $query_areas="SELECT * FROM areas";
                                                if ($resultado = mysqli_query($conn, $query_areas)) {
                                                /* obtener array asociativo */
                                                while ($row = mysqli_fetch_assoc($resultado)) {
                                                    echo '<option value="'.$row["id_are"].'">'.$row["area_are"].'</option>';
                                                }
                                                /* liberar el conjunto de resultados */
                                                mysqli_free_result($resultado);
                                                }
                                                echo "<br>";
                                            ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <div class="row justify-content-between">
                                            <div class="col-auto col-6">
                                                <button type="submit" id="btnGuardar" class="btn app-btn-primary"> Registrar</button>
                                            </div>
                                            <div class="col-auto col-6">
                                                <a class="btn app-btn-secondary" href="#"
                                                    data-bs-dismiss="modal">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>


    <!--******************************************************************************************************-->
    <!--MODAL AGREGAR USUARIO PERSONAL -->
    <div class="modal fade" id="modalCrearPersonal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title2 fs-5" id="staticBackdropLabel">Agregar Usuario Personal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="col-12 col-md-12    ">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form id="" class="settings-form">
                                    
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="Nombre">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="formGroupExampleInput6" class="form-label">Apellido
                                                paterno</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput6"
                                                placeholder="Apellido Paterno">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                            <label for="formGroupExampleInput7" class="form-label">Apellido
                                                Materno</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput7"
                                                placeholder="Apellido materno">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">N. Trabajador</label>
                                            <input type="text" class="form-control" id="addnTrabajador_add"
                                                placeholder="N. Trabajador">
                                        </div>
                                        
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                            <label for="setting-input-2" class="form-label">Rol</label>

                                            <select class="form-select" name="addarea_ad" id="addarea_add">
                                                <!--<option selected>Selecciona...</option>-->
                                                <?php
                                                include("../../Controlador/conect.php");
                                                $conn = mysqli_connect($db_host, $db_username, $db_password ,$db_name);

                                                $query_areas="SELECT * FROM roles";
                                                if ($resultado = mysqli_query($conn, $query_areas)) {
                                                /* obtener array asociativo */
                                                while ($row = mysqli_fetch_assoc($resultado)) {
                                                    echo '<option value="'.$row["id_rol"].'">'.$row["nombre_rol"].'</option>';
                                                }
                                                /* liberar el conjunto de resultados */
                                                mysqli_free_result($resultado);
                                                }
                                                echo "<br>";
                                            ?>
                                            </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="inputEmail4" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="inputEmail4">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                            <label for="inputPassword4" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="inputPassword4">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="inputPassword5" class="form-label">Repetir Password</label>
                                            <input type="password" class="form-control" id="inputPassword5">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">

                                        </div>
                                        <div class="col-6 mb-3">
                                            <button type="submit" class="btn app-btn-primary">Registrar usuario</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script src="../../assets/plugins/popper.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/chart.js/chart.min.js"></script>
    <script src="../../assets/js/app.js"></script>

    <!--Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../js/sweetAlert.js"></script>

    <!-- <script src="../../js/usuarios.js"></script> -->
    <script type="text/javascript" src="../../JS/tablas_usuarios.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>


</body>

</html>