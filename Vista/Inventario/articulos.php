



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Artículos</title>
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
        <?php require("navbarInventario.php");?><!-- Navbar -->
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <?php require("menuInventario.php");?> <!-- Menu lateral -->
        </div>
    </header>
    <?php require("articulosModel.php");?> 
    <!--Contenido-->
	<div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl" id="">
            <h1 class="app-page-title">Artículos</h1>

                <!-- cards de componentes-->
                <div class="row g-4 mb-4">
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Componentes de entrada</h4>
                                <?php 
                                $categoria='Componentes de entrada';
                                categorias($categoria);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Componentes de salida</h4>
                                <?php 
                                $categoria='Componentes de salida';
                                categorias($categoria);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Componentes de almacenamiento</h4>
                                <?php 
                                $categoria='Componentes de almacenamiento';
                                categorias($categoria);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Componentes de Redes</h4>
                                <?php 
                                $categoria='Componentes de redes';
                                categorias($categoria);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <label for="setting-input-2" class="form-label">Categorías</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Seleccionar categoría</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>    
                         
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                
                                <div class="col-auto">
                                    <!-- Button trigger modal -->
                                    <button type="button" id="limpiarCampos" class="btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#modalaCrearArticulo">
                                        Agregar Artículo
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
             <!-- Modal Para Editar Artículo-->
             <div class="modal fade" id="modalEditarArticulo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Artículo</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="settings-form" id="formEditaArticulos">
                              <div class="modal-body">
                                  <div class="col-12 col-md-12">
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <input id="id" type="hidden" name="id">
                                                <label for="setting-input-1" class="form-label">Folio<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                </span></label>
                                                <input type="text" class="form-control" id="folio"  required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-1" class="form-label">Nombre<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                </span></label>
                                                <input type="text" class="form-control" id="nombre"   required>
                                            </div>
                                        </div>
                                       
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-1" class="form-label">Marca<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                </span></label>
                                                <input type="text" class="form-control" id="marca"  required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-1" class="form-label">Modelo<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                </span></label>
                                                <input type="text" class="form-control" id="modelo"  required>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between">
                                            <!--
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Fecha de póliza</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Seleccionar proveedor</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>    
                                            </div>
-->
                                            <div class="col-6 mb-3">
                                            <label for="setting-input-2" class="form-label">Póliza</label>
                                                <select class="form-select" id="num_poliza" aria-label="Default select example">
                                                    <option selected>Seleccionar póliza</option>
                                                    <?php
                                                     $conect = mysqli_connect("localhost","root","","sistema_urse");
                                                     $conect->set_charset("utf8");
                                                     $qry_categorias="SELECT * FROM polizas WHERE estado_pol=1 ";
		                                             if ($resultado = mysqli_query($conect, $qry_categorias)) {
		                                             /* obtener array asociativo */
		                                             while ($row = mysqli_fetch_assoc($resultado)) {
		                                                 echo '<option value="'.$row["id_pol"].'">'.$row["num_pol"].'</option>';
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
                                            <div class="col-6 mb-3">
                                                 <label for="setting-input-2" class="form-label">Categoría</label>
                                                 <select class="form-select" name="categoria" id="categoria" required>
                                                     <option selected>Seleccionar categoría</option>
                                                     <?php
                                                     $conect = mysqli_connect("localhost","root","","sistema_urse");
                                                     $conect->set_charset("utf8");
                                                     $qry_categorias="SELECT * FROM categorias order by nombre_cat";
		                                             if ($resultado = mysqli_query($conect, $qry_categorias)) {
		                                             /* obtener array asociativo */
		                                             while ($row = mysqli_fetch_assoc($resultado)) {
		                                                 echo '<option value="'.$row["id_cat"].'">'.$row["nombre_cat"].'</option>';
		                                             }
		                                             /* liberar el conjunto de resultados */
		                                             mysqli_free_result($resultado);
		                                             }
                                                    echo "<br>";
    	                                         ?>
                                                 </select>   
                                            </div>
                                            <div class="col-6 mb-3">
                                                 <label for="setting-input-2" class="form-label">Proveedor</label>
                                                 <select class="form-select" name="proveedor" id="proveedor" required>
                                                     <option selected>Seleccionar Proveedor</option>
                                                     <?php
                                                     $conect = mysqli_connect("localhost","root","","sistema_urse");
                                                     $conect->set_charset("utf8");
                                                     $qry_categorias="SELECT * FROM proveedores order by empresa_prov";
		                                             if ($resultado = mysqli_query($conect, $qry_categorias)) {
		                                             /* obtener array asociativo */
		                                             while ($row = mysqli_fetch_assoc($resultado)) {
		                                                 echo '<option value="'.$row["id_prov"].'">'.$row["empresa_prov"].'</option>';
		                                             }
		                                             /* liberar el conjunto de resultados */
		                                             mysqli_free_result($resultado);
		                                             }
                                                    echo "<br>";
    	                                         ?>
                                                 </select>  
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="setting-input-1" class="form-label">Descripción<span class="ms-2"
                                                data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top">
                                            </label>
                                            <input type="text" class="form-control" id="descripcion"  required>
                                        </div>
                                  </div>
                               </div>
                                <div class="modal-footer">
                                    <div class="row justify-content-between">
                                        <div class="col-auto col-6">
                                            <button type="submit" id="btnGuardar"  class="btn app-btn-primary">Guardar</button>
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
                
               <!-- Termina modal-->

                <!-- Modal Para Agregar Artículo-->
                <div class="modal fade" id="modalArticulo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Artículo</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="settings-form" id="formArticulos">
                              <div class="modal-body">
                                  <div class="col-12 col-md-12">
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                            
                                                <label for="setting-input-1" class="form-label">Folio<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                </span></label>
                                                <input type="text" class="form-control" id="folio1" placeholder="Ingrese el folio" required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-1" class="form-label">Nombre<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                </span></label>
                                                <input type="text" class="form-control" id="nombre1" placeholder="Ingrese el nombre " required>
                                            </div>
                                        </div>
                                       
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-1" class="form-label">Marca<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                </span></label>
                                                <input type="text" class="form-control" id="marca1" placeholder="Ingrese la marca"required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-1" class="form-label">Modelo<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                </span></label>
                                                <input type="text" class="form-control" id="modelo1" placeholder="Ingrese el modelo" required>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Póliza</label>
                                                <select class="form-select" id="num_poliza1" aria-label="Default select example">
                                                    <option selected>Seleccionar póliza</option>
                                                    <?php
                                                     $conect = mysqli_connect("localhost","root","","sistema_urse");
                                                     $conect->set_charset("utf8");
                                                     $qry_categorias="SELECT * FROM polizas WHERE estado_pol=1 ";
		                                             if ($resultado = mysqli_query($conect, $qry_categorias)) {
		                                             /* obtener array asociativo */
		                                             while ($row = mysqli_fetch_assoc($resultado)) {
		                                                 echo '<option value="'.$row["id_pol"].'">'.$row["num_pol"].'</option>';
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
                                            <div class="col-6 mb-3">
                                                 <label for="setting-input-2" class="form-label">Categoría</label>
                                                 <select class="form-select"  id="categoria1" required>
                                                     <option selected>Seleccionar categoría</option>
                                                     <?php
                                                     $conect = mysqli_connect("localhost","root","","sistema_urse");
                                                     $conect->set_charset("utf8");
                                                     $qry_categorias="SELECT * FROM categorias WHERE estado=1 order by nombre_cat";
		                                             if ($resultado = mysqli_query($conect, $qry_categorias)) {
		                                             /* obtener array asociativo */
		                                             while ($row = mysqli_fetch_assoc($resultado)) {
		                                                 echo '<option value="'.$row["id_cat"].'">'.$row["nombre_cat"].'</option>';
		                                             }
		                                             /* liberar el conjunto de resultados */
		                                             mysqli_free_result($resultado);
		                                             }
                                                    echo "<br>";
    	                                         ?>
                                                 </select>   
                                            </div>
                                            <div class="col-6 mb-3">
                                                 <label for="setting-input-2" class="form-label">Proveedor</label>
                                                 <select class="form-select"  id="proveedor1" required>
                                                     <option selected>Seleccionar Proveedor</option>
                                                     <?php
                                                     $conect = mysqli_connect("localhost","root","","sistema_urse");
                                                     $conect->set_charset("utf8");
                                                     $qry_categorias="SELECT * FROM proveedores WHERE estado_prov=1 order by empresa_prov";
		                                             if ($resultado = mysqli_query($conect, $qry_categorias)) {
		                                             /* obtener array asociativo */
		                                             while ($row = mysqli_fetch_assoc($resultado)) {
		                                                 echo '<option value="'.$row["id_prov"].'">'.$row["empresa_prov"].'</option>';
		                                             }
		                                             /* liberar el conjunto de resultados */
		                                             mysqli_free_result($resultado);
		                                             }
                                                    echo "<br>";
    	                                         ?>
                                                 </select>  
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="setting-input-1" class="form-label">Descripción<span class="ms-2"
                                                data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top">
                                            </label>
                                            <input type="text" class="form-control" id="descripcion1"  required>
                                        </div>
                                  </div>
                               </div>
                                <div class="modal-footer">
                                    <div class="row justify-content-between">
                                        <div class="col-auto col-6">
                                            <button type="submit" id="btnGuardar" class="btn app-btn-primary">Guardar</button>
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
               <!-- Termina modal-->

                
                <!-- Tabla-->
                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all"
                        role="tab" aria-controls="orders-all" aria-selected="true">Artículos disponibles</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid"
                        role="tab" aria-controls="orders-paid" aria-selected="false">Artículos ocupados</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending"
                        role="tab" aria-controls="orders-pending" aria-selected="false">Artículos en Baja</a>
                    
                </nav>


                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table id="datos_articulos" class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Folio</th>
                                                <th class="cell">Artículo</th>
                                                <th class="cell">Modelo</th>
                                                <th class="cell">Marca</th>
                                                <th class="cell">Descripción</th>
                                                <th class="cell">Núm. de póliza</th>
                                                <th class="cell">Proveedor</th>
                                                <th class="cell">Categoría</th>
                                                <th class="cell">Estado</th>
                                                <th class="cell">Opciones</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                        <div class="app-card app-card-orders-table mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table id="datos_artOcupados" class="table mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Folio</th>
                                                <th class="cell">Artículo</th>
                                                <th class="cell">Modelo</th>
                                                <th class="cell">Marca</th>
                                                <th class="cell">Descripción</th>
                                                <th class="cell">Núm. de póliza</th>
                                                <th class="cell">Proveedor</th>
                                                <th class="cell">Categoría</th>
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
                                    <table id="datos_artInactivos" class="table mb-0 text-left">
                                        <thead>
                                        <tr>
                                                <th class="cell">Folio</th>
                                                <th class="cell">Artículo</th>
                                                <th class="cell">Modelo</th>
                                                <th class="cell">Marca</th>
                                                <th class="cell">Descripción</th>
                                                <th class="cell">Núm. de póliza</th>
                                                <th class="cell">Proveedor</th>
                                                <th class="cell">Categoría</th>
                                                <th class="cell">Estado</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SCRIPT PARA OBTENER LOS ARTICULOS -->

			</div>
	    </div>
    </div>				

<!-- SCRIPT PARA OBTENER LOS ARTICULOS -->
    <script src="../../assets/plugins/popper.min.js"></script>

    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="articuloController.js"></script> 
    
    <!-- Javascript -->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/chart.js/chart.min.js"></script>
    <script src="../../assets/js/app.js"></script>		

    <!-- sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../js/sweetAlert.js"></script>

</body>
</html>


