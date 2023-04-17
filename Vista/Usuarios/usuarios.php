<?php

session_start(); // Inicia la sesión
if (!isset($_SESSION['name'])) { // Verifica si el usuario está logueado
  header('Location: ../../index.php'); // Redirecciona al usuario a la página de inicio
  exit(); // Detiene la ejecución del script
}

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
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/validaciones.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/sistemaIS.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 

    <script defer="" src="../../assets/plugins/fontawesome/js/all.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css">
    <!-- Extension responsiva-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.css">
    <link rel="stylesheet" href="../../Assets/css/signup-form.css" type="text/css">

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

                <!-- BOTONES AGREGAR DATOS ADMINISTRATIVOS Y PERSONAL -->
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
                                        data-bs-toggle="modal" data-bs-target="#addUserModal">
                                        Agregar Datos de Personal
                                    </button>
                                </div>
                                <div class="col-auto">
                                    <button id="limpiarCampos2" type="button" class="btn app-btn-secondary"
                                        data-bs-toggle="modal" data-bs-target="#modalCrearPersonal">
                                        Asignar Cuentas de Correo
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- NAVBAR DE USUARIOS -->
                <nav id="orders-table-tab"
                    class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab"
                        href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Usuarios (Datos personales)</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
                        href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Personal (Con correo asignado)</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab"
                        href="#orders-pending" role="tab" aria-controls="orders-pending"
                        aria-selected="false">Administrativos</a>
                    <!-- <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab"
                        href="#orders-cancelled" role="tab" aria-controls="orders-cancelled"
                        aria-selected="false">Inactivos</a> -->
                </nav>

                <!-- TABLAS -->
                <div class="tab-content" id="orders-table-tab-content">
                    <!-- TABLA DE TODOS LOS USUARIOS -->
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel"
                        aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                    <table id="Usuarios" class="table app-table-hover mb-0 display nowrap text-left"  cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="cell">Id</th>
                                                <th class="cell">Nombre</th>
                                                <th class="cell">A. Paterno</th>
                                                <th class="cell">A. Materno</th>
                                                <th class="cell">Trabajador</th>
                                                <th class="cell">Tipo</th>
                                                <th class="cell">Área</th>
                                                <th class="cell">Estado</th>
                                                <th ></th>
                                                <th ></th>
                                                
                                            </tr>
                                        </thead>
                                    </table>
                            </div>
                        </div>
                    </div>
                    <!-- TABLA DE LOS USUARIOS PERSONALES -->
                    <div class="tab-pane fade show" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                    <table id="usuarios_personal" class="table app-table-hover mb-0 display nowrap text-left"  cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="cell">Id</th> 
                                                <th class="cell">Nombre</th>
                                                <th class="cell">A. Paterno</th>
                                                <th class="cell">A. Materno</th>
                                                <th class="cell">N. Trabajador</th>
                                                <th class="cell">Correo</th>
                                                <th class="cell">Área</th>
                                                <th class="cell">Rol</th>
                                                <th class="cell">Estados</th>
                                                <th class="cell">Correo</th>
                                            </tr>
                                        </thead>
                                    </table>
                            </div>
                        </div>
                    </div>
                    <!-- TABLA DE LOS USUARIOS ADMINISTRATIVOS -->
                    <div class="tab-pane fade show " id="orders-pending" role="tabpanel"
                        aria-labelledby="orders-pending-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                    <table id="usuarios_administrativos" class="table app-table-hover mb-0 display nowrap text-left"  cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="cell">Id</th>
                                                <th class="cell">Nombre</th>
                                                <th class="cell">A. Paterno</th>
                                                <th class="cell">A. Materno</th>
                                                <th class="cell">N. Trabajador</th>
                                                <th class="cell">Tipo</th>
                                                <th class="cell">Área</th>
                                                <th class="cell">Estado</th>
                                                <th class="cell"></th>
                                                <th class="cell"></th>

                                            </tr>
                                        </thead>
                                    </table>
                            </div>
                        </div>
                    </div>
                    <!-- TABLA DE LOS USUARIOS INACTIVOS -->
                    <div class="tab-pane fade" id="orders-cancelled" role="tabpanel"
                        aria-labelledby="orders-cancelled-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                    <table id="usuarios_inactivos" class="table app-table-hover mb-0 display nowrap text-left"  cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th class="cell">Id</th>
                                                <th class="cell">Nombre</th>
                                                <th class="cell">Apellido Paterno</th>
                                                <th class="cell">Apellido Materno</th>
                                                <th class="cell">N. Trabajador</th>
                                                <th class="cell">Tipo</th>
                                                <th class="cell">Área Personal</th>
                                                <th class="cell">Estado Personal</th>
                                                <th class="cell"></th>
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

    <!--******************************************************************************************************-->
    <!-- MODAL AGREGAR DATOS DE USUARIO -->
    <div class="modal fade" id="addUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Datos de Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">


                    <div class="col-12 col-md-12    ">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form id="addUser" class="">
                                    
                                    <div class="row justify-content-between">
                                        <!-- grupo addnombre_ad-->
                                        <!-- <div class="addUser__grupo" id="grupo__addnombre_ad">
                                            <label for="addnombre_ad" class="addUser__label">Nombre</label>
                                            <div class="addUser__grupo-input">--> <!-- para que aparezca el icono dentro del div-->
                                        <!--        <input type="text" class="addUser__input" name="addnombre_ad" id="addnombre_ad" placeholder="Nombre">
                                                <i class="addUser__validacion-estado fas fa-times-circle"></i>                                                
                                            </div>
                                            <p class="addUser__input-error">3 a 5</p>
                                        </div> -->

                                        <div class="col-6 mb-3">
                                            <label for="addnombre_ad" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="addnombre_ad" placeholder="Nombre">
                                            <div id="Pnombre-error" class="error"></div>

                                        </div>
                                        
                                        <div class="col-6 mb-3">
                                            <label for="addapellidoP_ad" class="form-label">Apellido
                                                paterno</label>
                                            <input type="text" class="form-control" id="addapellidoP_ad" placeholder="Apellido Paterno">
                                            <div id="PapellidoP-error" class="error"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                            <label for="addapellidoM_ad" class="form-label">Apellido
                                                Materno</label>
                                            <input type="text" class="form-control" id="addapellidoM_ad" placeholder="Apellido materno">
                                            <div id="PapellidoM-error" class="error"></div>

                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="addnTrabajador_ad" class="form-label">N. Trabajador</label>
                                            <input type="text" class="form-control" id="addnTrabajador_ad" placeholder="N. Trabajador">
                                            <div id="Pntrabajador-error" class="error"></div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-12 mb-3">
                                            <label for="addarea_ad" class="form-label">Área</label>

                                            <select class="form-select" name="addarea_ad" id="addarea_ad" required>
                                                <option selected disabled value=""></option>
                                                    <?php
                                                     $conect = mysqli_connect("localhost","root","","sistema_urse");
                                                     $conect->set_charset("utf8");
                                                     $qry_categorias="SELECT * FROM areas";
		                                             if ($resultado = mysqli_query($conect, $qry_categorias)) {
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
                                            <div id="Parea-error" class="error"></div>
                                     
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-12 mb-3">
                                            <label for="addTipo_ad" class="form-label">Tipo de Registro</label>
                                            <select class="form-select" name="addTipo_ad" id="addTipo_ad" required>
                                                <option selected disabled></option>
                                                    <?php
                                                     $conect = mysqli_connect("localhost","root","","sistema_urse");
                                                     $conect->set_charset("utf8");
                                                     $qry_categorias="SELECT * FROM tipo_personal";
		                                             if ($resultado = mysqli_query($conect, $qry_categorias)) {
		                                             /* obtener array asociativo */
		                                             while ($row = mysqli_fetch_assoc($resultado)) {
		                                                 echo '<option value="'.$row["id_tipoper"].'">'.$row["tipo_per"].'</option>';
		                                             }
		                                             /* liberar el conjunto de resultados */
		                                             mysqli_free_result($resultado);
		                                             }
                                                    echo "<br>";
    	                                         ?>   
                                            </select>
                                            <div id="Ptipo-error" class="error"></div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row justify-content-between">
                                            <div class="col-auto col-6">
                                                <button type="submit" class="btn app-btn-primary"> Registrar</button>
                                            </div> 
                                            
                                            <div class="col-auto col-6">
                                                <a class="btn app-btn-secondary" href="" data-bs-dismiss="modal">Cancelar</a>
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

    <!-- MODAL EDITAR DATOS DE REGISTROS GENERAL-->
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title3 fs-5" id="staticBackdropLabel">Editar datos del registro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">


                    <div class="col-12 col-md-12    ">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form id="updateUser" class="settings-form">
                                    <input type="hidden" name="id" id="id" value="">
                                    <input type="hidden" name="trid" id="trid" value="">
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">

                                            <label for="edtnombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="edtnombre" name="edtnombre">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="edtapellidoP" class="form-label">Apellido
                                                paterno</label>
                                            <input type="text" class="form-control" name="edtapellidoP" id="edtapellidoP">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                            <label for="edtapellidoM" class="form-label">Apellido Materno</label>
                                            <input type="text" class="form-control" id="edtapellidoM" name="edtapellidoM">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="edtnTrabajador" class="form-label">N. Trabajador</label>
                                            <input type="text" class="form-control" id="edtnTrabajador" name="edtnTrabajador">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-12 mb-3">
                                            <label for="edtarea" class="form-label">Área</label>

                                            <select class="form-select" name="edtarea" id="edtarea" required>
                                            <option selected disabled>Seleccionar Área</option>
                                                    <?php
                                                     $conect = mysqli_connect("localhost","root","","sistema_urse");
                                                     $conect->set_charset("utf8");
                                                     $qry_categorias="SELECT * FROM areas";
		                                             if ($resultado = mysqli_query($conect, $qry_categorias)) {
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
                                    <div class="row justify-content-between">
                                        <div class="col-12 mb-3">
                                            <input type="hidden" class="form-control" id="edtestado" name="edtestado">
                                            <label for="edttipo" class="form-label">Tipo de personal</label>
                                            <select class="form-select" name="edttipo" id="edttipo" required>
                                                <option selected disabled>Seleccionar Tipo</option>
                                                    <?php
                                                     $conect = mysqli_connect("localhost","root","","sistema_urse");
                                                     $conect->set_charset("utf8");
                                                     $qry_categorias="SELECT * FROM tipo_personal";
		                                             if ($resultado = mysqli_query($conect, $qry_categorias)) {
		                                             /* obtener array asociativo */
		                                             while ($row = mysqli_fetch_assoc($resultado)) {
		                                                 echo '<option value="'.$row["id_tipoper"].'">'.$row["tipo_per"].'</option>';
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
                                                <button type="submit" id="btnGuardar" class="btn app-btn-primary">
                                                    Actualizar</button>
                                            </div>
                                            <div class="col-auto col-6">
                                                <a class="btn app-btn-secondary" href="http://localhost/URSE/Sistema-inventario-soporte/vista/usuarios/usuarios.php#" data-bs-dismiss="modal">Cancelar</a>
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
    <!--MODAL ASIGNAR USUARIO PERSONAL -->
    <div class="modal fade" id="modalCrearPersonal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title2 fs-5" id="staticBackdropLabel">Asignar Cuenta Personal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="col-12 col-md-12    ">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <!-- Contenido -->
                                            <div class="signup-form-container">
                                                <form method="post" role="form" id="register-form" autocomplete="off" novalidate="novalidate">    
                                                    <div class="form-body">
                                                        <!-- json response will be here -->
                                                        <div id="errorDiv"></div>
                                                        <!-- json response will be here -->
                                                        
                                                        <div class="form-group">
                                                            <div class="row justify-content-between">
                                                                <div class="col-12 mb-3">
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text" id="basic-addon1">E-mail</span>
                                                                        <input name="email" id="email" type="text" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" maxlength="50">
                                                                    </div>
                                                                    <span class="help-block" id="error"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row justify-content-between">
                                                                <div class="col-12 mb-3">
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text" id="basic-addon2">Constraseña</span>
                                                                        <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña">
                                                                    </div>
                                                                    <span class="help-block" id="error"></span>
                                                                </div>
                                                            </div> 
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row justify-content-between">
                                                                <div class="col-12 mb-3">
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text" id="basic-addon3">Contraseña</span>
                                                                        <input name="cpassword" type="password" class="form-control" placeholder="Repita contraseña">
                                                                </div>
                                                                <span class="help-block" id="error"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row justify-content-between">
                                                                <div class="col-12 mb-3">
                                                                    <div class="input-group mb-3">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Rol</label>
                                                                        <select class="form-select" name="rol_usu" id="rol_usu" required="" aria-required="true">
                                                                            <option selected disabled value="">Seleccionar Área</option>
                                                                            <?php
                                                                            $conect = mysqli_connect("localhost","root","","sistema_urse");
                                                                            $conect->set_charset("utf8");
                                                                            $qry_categorias="SELECT * FROM roles";
                                                                            if ($resultado = mysqli_query($conect, $qry_categorias)) {
                                                                            /* obtener array asociativo */
                                                                            while ($row = mysqli_fetch_assoc($resultado)) {
                                                                                echo '<option value="'.$row["id_rol"].'">'.$row["nombre_rol"].'</option>';
                                                                            }
                                                                            /* liberar el conjunto de resultados */
                                                                            mysqli_free_result($resultado);
                                                                            }
                                                                            echo "<br>";
                                                                            ?></div>
                                                                        </select>
                                                                    <!-- <span class="help-block" id="error"></span> -->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row justify-content-between">
                                                                <div class="col-12 mb-3">
                                                                    <div class="input-group mb-3">
                                                                        <label class="input-group-text" for="inputGroupSelect02">Personal</label>
                                                                        <select class="form-select" name="personal_usu" id="pesonal_usu" required="" aria-required="true">
                                                                                <option selected disabled value="">Selecciona el personal</option>
                                                                                <?php
                                                                                $conect = mysqli_connect("localhost","root","","sistema_urse");
                                                                                $conect->set_charset("utf8");
                                                                                $qry_categorias="SELECT * FROM vista_listaPersonal";
                                                                                if ($resultado = mysqli_query($conect, $qry_categorias)) {
                                                                                /* obtener array asociativo */
                                                                                while ($row = mysqli_fetch_assoc($resultado)) {
                                                                                    echo '<option value="'.$row["id"].'">'.$row["nombre"].' '.$row["apellidoP"].' '.$row["apellidoM"].'</option>';
                                                                                }
                                                                                /* liberar el conjunto de resultados */
                                                                                mysqli_free_result($resultado);
                                                                                }
                                                                                echo "<br>";
                                                                                ?></div>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-footer">
                                                        <div class="row justify-content-between">
                                                            <div class="col-auto col-6">
                                                                <button type="submit" id="btn-signup" class="btn app-btn-secondary">Registrar</button>
                                                            </div>
                                                            <div class="col-auto col-6">
                                                                <a class="btn app-btn-secondary" href="http://localhost/URSE/Sistema-inventario-soporte/vista/usuarios/usuarios.php#" data-bs-dismiss="modal">Cancelar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                            </div></form><!-- Fin Contenido -->
                                        </div>
                                    </div>
                                    <!-- Fin row -->
                                </div>
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

    <script src="assets/jquery.validate.min.js"></script> 

    <!--Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../js/sweetAlert.js"></script>
    
    <!-- Datatables -->
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <!-- Funciones JS -->
    <script src="../../js/funcionesUsuarios.js"></script>
    <script src="assets/validarRegistro.js"></script> <!-- Asignar correo-->
    
    <!-- <script src="../../js/validaciones.js"></script> -->
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

 
   
    


</body>

</html>