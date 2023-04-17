<?php
session_start(); // Inicia la sesión
if (!isset($_SESSION['name'])) { // Verifica si el usuario está logueado
  header('Location: ../../index.php'); // Redirecciona al usuario a la página de inicio
  exit(); // Detiene la ejecución del script
}   
    require('../../Controlador/conect.php');
    $conn   =   mysqli_connect($db_host, $db_username, $db_password ,$db_name);
    $valor  =   $_SESSION['id'];
    $name   =   $_SESSION["name"];
    $app    =   $_SESSION["app"];
    $rol    =   $_SESSION["rol"];
?>

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
    
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <!-- jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script defer src="../../assets/plugins/fontawesome/js/all.min.js"></script>
    <script src="../../js/funcionesMant.js"></script>

    <!-- Datatables / Responsive -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.css">

    <!-- Css-->
    <link rel="stylesheet" href="../../Assets/css/signup-form.css" type="text/css">

</head>

<body class="app">
    <?php
       date_default_timezone_set('America/Mexico_City');
       $fecha_actual=date("Y-m-d h:i:s");
    ?>

    <header class="app-header fixed-top">
        <?php require("navbarSoporte.php");?><!-- Navbar -->
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <?php require("menuSoporte.php");?> <!-- Menu lateral -->
        </div>
    </header>

    <!-- C O N T E N I D O-->
	<div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl" id="">
                <h1 class="app-page-title">Finalizar mantenimiento</h1>
                <hr class="mb-4">

                <!-- BOTÓN PARA ABRIR PANTALLA DE SOLICITAR SOPORTE  -->
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0"></h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <button type="button" class="btn app-btn-secondary" onclick="modificarequipo();">
                                        Modificar Equipo
                                    </button>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn app-btn-secondary" onclick="solicitarmant();">
                                        Solicitar Mantenimiento
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MENU PARA MOSTRAR LAS DIFERENTES TABLAS, SOLICITUDES / FINALIZADOS / CANCELADOS -->
                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all"
                        role="tab" aria-controls="orders-all" aria-selected="true">Pendientes</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid"
                        role="tab" aria-controls="orders-paid" aria-selected="fal se">Finalizados</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending"
                        role="tab" aria-controls="orders-pending" aria-selected="false">Cancelados</a>
                </nav>

                <!-- TABLAS SOLICITUDES DE MANTENIMIENTO / FINALIZADS / CANCELADAS  -->
                <div class="tab-content" id="orders-table-tab-content">
                    <!-- SOLICITUDES DE SOPORTES -->
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <table id="smantenimiento" class="table app-table-hover mb-0 display nowrap text-left"  cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="cell">Folio</th>
                                            <th class="cell">Estado</th>
                                            <th class="cell">Solicita </th>
                                            <th class="cell">Nombre</th>
                                            <th class="cell">A. Paterno</th>
                                            <!-- <th class="cell">A. Materno</th>  -->
                                            <th class="cell">Soporte</th>
                                            <th class="cell">Equipo</th>
                                            <th class="cell">Ingresó</th>
                                            <!-- <th class="cell"></th> -->
                                            <th class="cell"></th>
                                            <th class="cell"></th>
                                            <th class="cell">Área</th>
                                            <th class="cell">Observaciones</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- SOPORTES FINALIZADOS -->
                    <div class="tab-pane fade show" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <table id="fmantenimientos" class="table app-table-hover mb-0 display nowrap text-left"  cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="cell">Folio</th>
                                            <th class="cell">Estado</th>
                                            <!-- <th class="cell">Atendido</th> -->
                                            <th class="cell">Solicito</th>
                                            <th class="cell">Nombre</th>
                                            <th class="cell">A. Paterno</th>
                                            <th class="cell">Área</th>
                                            <th class="cell">Equipo</th>
                                            <th class="cell">Soporte</th>
                                            
                                            <th class="cell">Ingreso</th>
                                            <th class="cell">Descripción</th>
                                            <th class="cell">Entregado</th>
                                            <th class="cell">Descripción de entrega</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- SOPORTES CANCELADOS -->
                    <div class="tab-pane fade show" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <table id="cmantenimientos" class="table app-table-hover mb-0 display nowrap text-left"  cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="cell">Folio</th>
                                            <th class="cell">Estado</th>
                                            <!-- <th class="cell">Atendido</th> -->
                                            <th class="cell">Solicito</th>
                                            <th class="cell">Nombre</th>
                                            <th class="cell">A. Paterno</th>
                                            <th class="cell">Área</th>
                                            <th class="cell">Equipo</th>
                                            <th class="cell">Soporte</th>
                                            <th class="cell">Ingreso</th>
                                            <th class="cell">Descripción</th>
                                            <th class="cell">Entregado</th>
                                            <th class="cell">Descripción de entrega</th>
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
    <!-- MODAL PARA CANCELAR EL MANTENIMIENTO  -->
    <div class="modal fade" id="addcancelarM_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Por qué desea cancelar el mantenimiento?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">

                    <div class="col-12 col-md-12    ">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form id="cancelarS_Mant" class="settings-form">
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                            <label for="folio_cancel" class="form-label" >Folio del Mantenimiento</label>
                                            <input type="text" class="form-control" id="cancelid" name="cancelid" disabled hidden>
                                            <input type="text" class="form-control" id="cancelFolio" name="folio_cancel" disabled>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="tecnico_cancel" class="form-label">Técnico</label>
                                            <input type="text" class="form-control" id="cancelTecnico" name="cancelTecnico" value="<?php echo $valor ?>" disabled hidden>
                                            <input type="text" class="form-control" value="<?php echo $name, " ", $app ?>" disabled>
                                        </div>
                                    </div>
                            
                                    <label for="setting-input-1" class="form-label">Razones para cancelar<span class="ms-2"
                                                                data-container="body" data-bs-toggle="popover" data-trigger="hover" >                                                         </label>
                                    <div class="form-floating">
                                        <textarea class="form-control"  name="cancelObservaciones" id="cancelObservaciones" style="height: 100px"></textarea>
                                        <input type="datetime" class="form-control" name="cancelFecha" id="cancelFecha" value="<?php echo $fecha_actual ?>" disabled hidden>
                                    </div> 
                                
                                    <div class="modal-footer">
                                        <div class="row justify-content-between">
                                            <div class="col-auto col-6">
                                                <button type="submit" class="btn app-btn-secondary"> Guardar</button>
                                            </div>
                                            <div class="col-auto col-6">
                                                <a  class="btn app-btn-secondary" href="" data-bs-dismiss="modal">Cancelar</a>
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
    <!-- MODAL PARA FINALIZAR EL MANTENIMIENTO  -->
    <div class="modal fade" id="addFinalizarM_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addFinalizarM_Modal">Finalizar mantenimiento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">

                    <div class="col-12 col-md-12    ">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form id="finalizar_Mant" class="settings-form">
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                            <label for="folio_cancel" class="form-label" >Folio del Mantenimiento</label>
                                            <input type="text" class="form-control" id="finalid" name="finalid" disabled hidden>
                                            <input type="text" class="form-control" id="finalFolio" name="finalFolio" disabled>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="tecnico_cancel" class="form-label">Técnico</label>
                                            <input type="text" class="form-control" id="finalTecnico" name="finalTecnico" value="<?php echo $valor ?>" disabled hidden>
                                            <input type="text" class="form-control" value="<?php echo $name, " ", $app ?>" disabled>
                                        </div>
                                    </div>

                                    <label for="setting-input-1" class="form-label">Observaciones<span class="ms-2"
                                                                data-container="body" data-bs-toggle="popover" data-trigger="hover" >                                                         </label>
                                    <div class="form-floating">
                                        <textarea class="form-control"  name="finalObservaciones" id="finalObservaciones" style="height: 100px"></textarea>
                                        <input type="datetime" class="form-control" name="finalFecha" id="finalFecha" value="<?php echo $fecha_actual ?>" disabled hidden>
                                    </div> 
                                    
                                    <div class="row justify-content-between"> 
                                        <div class="row g-2 settings-section">
                                            <hr class="mb-4">
                                            <div class="col-12 g2 col-md-4">
                                                <div class="app-card-body">
                                                    <div class="form-check mb-3" >
                                                        <input class="form-check-input" type="checkbox" value="1" id="opcion1" name="opcion1"onclick="mostrarOpcion()" > 
                                                        <label class="form-check-label" for="settings-checkbox-1">Desactivar</label>                                  
                                                    </div>
                                                </div>					    
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <label  class="form-label">Equipo de cómputo</label>
                                                <div class="section-intro"> <p style="text-align: justify;">Si el equipo no esta en condiciones, dar de baja para asignarle uno diferente, cabe mensionar que 
                                                                            los artículos relacionados estarán disponibles para otro equipo.</p></div>
                                            </div>
                                        </div>                                       
                                    </div>

                                    <!-- ********************************************** -->
                                    
                                    <!-- onclick="mostrareditEquipo()" -->
                                    <!-- <div id="opcion_Equipo" class="row justify-content-between"> 
                                            <div class="row g-2 settings-section">
                                                <hr class="mb-4">
                                                <div class="col-12 g2 col-md-4">
                                                    <div class="app-card-body">
                                                        <div class="form-check mb-3" >
                                                            <input class="form-check-input" type="checkbox" value="" id="checkboxedit" name="" > 
                                                            <label class="form-check-label" for="settings-checkbox-1">Editar</label>                                  
                                                        </div>
                                                    </div>					    
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <label  class="form-label">Editar Equipo</label>
                                                    <div class="section-intro"> <p style="text-align: justify;">Seleccionar en caso que el equipo necesite un nuevo componente o este se haya instalado en el mantenimiento (Actualizar información).</p></div>
                                                </div>
                                            </div>   
                                            
                                            <div id="contenido_editar" style="display:none">
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                        <input type="text" class="form-control" id="fequipo" name="fequipo"  >
                                                        <label for="" class="form-label" >CPU</label>
                                                        <input type="text" class="form-control"  id="" name="n_cpu" >
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label">Teclado</label>
                                                        <input type="text" class="form-control" id="n_teclado" name="n_teclado" >
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label" >Mouse</label>
                                                        <input type="text" class="form-control" id="n_mouse" name="n_mouse" >
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label">Monitor</label>
                                                        <input type="text" class="form-control" id="n_monitor" name="n_monitor" >
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label" >Procesador</label>
                                                        <input type="text" class="form-control" id="n_procesador" name="n_procesador" >
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label">Almacenamiento</label>
                                                        <input type="text" class="form-control"id="n_almacenamiento" name="n_almacenamiento" >
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label" >RAM</label>
                                                        <input type="text" class="form-control" id="n_ram" name="n_ram" >
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label">Software</label>
                                                        <input type="text" class="form-control" id="n_software" name="n_software" >
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label" >Dirección IP</label>
                                                        <input type="text" class="form-control" id="n_ip" name="n_ip" >
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label">Ruta</label>
                                                        <input type="text" class="form-control" id="n_ruta" name="n_ruta" >
                                                    </div>
                                                </div>
                                            </div>
                                    </div> -->

                                    <!-- *********************************************** -->
                                    <div class="modal-footer">
                                        <div class="row justify-content-between">
                                            <div class="col-auto col-6">
                                                <button type="submit" class="btn app-btn-secondary" > Guardar</button> <!-- data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" -->
                                            </div>
                                            <div class="col-auto col-6">
                                                <a class="btn app-btn-secondary"  data-bs-dismiss="modal">Cancelar</a>
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

    <!-- Modal para editar el equipo de computo, sus componentes -->
    <div class="modal fade" id="editArti" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addFinalizarM_Modal">Finalizar mantenimiento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">

                    <div class="col-12 col-md-12    ">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form id="EditArticuloss" class="settings-form">
                                   
                                    <!-- ********************************************** -->     
                                    <div id="opcion_Equipo" class="row justify-content-between"> 
                                            <div class="row g-2 settings-section">
                                                <hr class="mb-4">
                                                <div class="col-12 g2 col-md-4">
                                                    <div class="app-card-body">
                                                        <div class="form-check mb-3" >
                                                            <input class="form-check-input" type="checkbox" value="" id="checkboxedit" name="" onclick="mostrareditEquipo()"> 
                                                            <label class="form-check-label" for="settings-checkbox-1">Editar</label>                                  
                                                        </div>
                                                    </div>					    
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <label  class="form-label">Editar Equipo</label>
                                                    <div class="section-intro"> <p style="text-align: justify;">Seleccionar en caso que el equipo necesite un nuevo componente o este se haya instalado en el mantenimiento (Actualizar información).</p></div>
                                                </div>
                                            </div>   
                                            
                                            <div id="contenido_editar" style="display:none">
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                        <input type="text" class="form-control" id="fequipo" name="fequipo"  >
                                                        <label for="" class="form-label" >CPU</label>
                                                        <input type="text" class="form-control"  id="" name="n_cpu" >
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label">Teclado</label>
                                                        <input type="text" class="form-control" id="n_teclado" name="n_teclado" >
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label" >Mouse</label>
                                                        <input type="text" class="form-control" id="n_mouse" name="n_mouse" >
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label">Monitor</label>
                                                        <input type="text" class="form-control" id="n_monitor" name="n_monitor" >
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label" >Procesador</label>
                                                        <input type="text" class="form-control" id="n_procesador" name="n_procesador" >
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label">Almacenamiento</label>
                                                        <input type="text" class="form-control"id="n_almacenamiento" name="n_almacenamiento" >
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label" >RAM</label>
                                                        <input type="text" class="form-control" id="n_ram" name="n_ram" >
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label">Software</label>
                                                        <input type="text" class="form-control" id="n_software" name="n_software" >
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label" >Dirección IP</label>
                                                        <input type="text" class="form-control" id="n_ip" name="n_ip" >
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="" class="form-label">Ruta</label>
                                                        <input type="text" class="form-control" id="n_ruta" name="n_ruta" >
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <!-- *********************************************** -->
                                    <div class="modal-footer">
                                        <div class="row justify-content-between">
                                            <div class="col-auto col-6">
                                                <button type="submit" class="btn app-btn-secondary" > Guardar</button> <!-- data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" -->
                                            </div>
                                            <div class="col-auto col-6">
                                                <a class="btn app-btn-secondary"  data-bs-dismiss="modal">Cancelar</a>
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



    <!-- Javascript -->
    <script src="../../assets/plugins/popper.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/chart.js/chart.min.js"></script>
    <script src="../../assets/js/app.js"></script>		

    <!-- Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Data table -->
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
   
    <script>
        
        function mostrarOpcion() {
            var opcion1= document.getElementById("opcion_Equipo");
                if (document.getElementById("opcion1").checked) {
                    opcion1.style.display = "none";
                } else {
                    opcion1.style.display = "block";
                }
        }

        function mostrareditEquipo() {
        var contenido_editar = document.getElementById("contenido_editar");
            if (document.getElementById("checkboxedit").checked) {
                contenido_editar.style.display = "block";
            } else {
                contenido_editar.style.display = "none";
            }
        }

    </script>
</body>

</html>
