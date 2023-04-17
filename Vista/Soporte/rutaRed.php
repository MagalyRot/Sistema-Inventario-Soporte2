<?php

    if(isset($_POST['valor'])){
        $opcion=$_POST['valor'];
        $id=$_POST['id_ruta'];
     $conect = mysqli_connect("localhost","root","","sistema_urse");
     $conect->set_charset("utf8");
     $sql= "SELECT * from vista_rutas WHERE id=".$id;
      $getUser=mysqli_query($conect,$sql);
    if($getUser->num_rows >0){
           while ($fila= $getUser->fetch_object()) {
                  $ruta=$fila;
           break;
           }

           //@session_start();  
      }
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
    <link id="theme-style" rel="stylesheet" href="../../assets/css/sistemaIS.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script defer src="../../assets/plugins/fontawesome/js/all.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css">
    <!-- Extension responsiva-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.css">  

</head>

<body class="app">
    <header class="app-header fixed-top">
        <?php require("navbarSoporte.php");?><!-- Navbar -->
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <?php require("menuSoporte.php");?> <!-- Menu lateral -->
        </div>
    </header>
    <?php require("rutaRedModel.php");?> 
    <!--Contenido-->
	<div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl" id="">
            <h1 class="app-page-title">Ruta de red</h1>
                <div class="row g-4 mb-4">
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Rutas de red</h4>
                                <?php 
                                rutas();
                                ?>
                            </div>
                            <a class="app-card-link-mask" href="rutaRed.php"></a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Segmentos</h4>
                                <?php 
                                segmentos();
                                ?>
                            </div>
                            <a class="app-card-link-mask" href="consultarSegmentos.php"></a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">VLANS</h4>
                                <?php 
                                vlans();
                                ?>
                            </div>
                            <a class="app-card-link-mask" href="consultarVlans.php"></a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Equipos de cómputo</h4>
                                <?php 
                                equipos();
                                ?>
                            </div>
                            <a class="app-card-link-mask" href="../Inventario/equipoCompu.php"></a>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">  
                                <div class="col-auto">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#modalCrearRutaRed" id="limpiarCampos">
                                        Agregar Ruta de Red
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Modal Actualización de Rutas -->
                
                <div class="modal fade" id="modalEditarRutaRed" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title2 fs-5" id="staticBackdropLabel"></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="settings-form" >
                               <div class="modal-body">
                                <div class="col-12 col-md-12">
                                        <div class="row justify-content-between">    
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">VLAN</label>
                                                    <select class="form-select" aria-label="Default select example" id="vlan">
                                                        <option >Seleccionar VLAN</option>
                                                        <?php  
                                                        getVlan();
                                                        ?>
                                                    </select>    
                                            </div>  
                                        </div>
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Segmento</label>
                                                    <select class="form-select" aria-label="Default select example" id="segmento" required>
                                                        <option >Seleccionar segmento...</option>
                                                        <?php
                                                        getSegmentos();
                                                        ?>
                                                    </select>    
                                            </div>      
                                            <div class="col-6 mb-3">
                                                    <div class="mb-3">
                                                        <label for="setting-input-1" class="form-label">Nodo<span class="ms-2"
                                                            data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                                            data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                        </label>
                                                        <input type="text" class="form-control" id="nodo"  required>
                                                    </div>  
                                            </div>  
                                        </div>
                                        <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Panel de Parcheo</label>
                                                    <select class="form-select" id="panel1" aria-label="Default select example"  required>
                                                        <option >Seleccionar panel...</option>
                                                        <?php
                                                            getParcheo();
    	                                                ?>
                                                    </select>    
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Puerto del panel</label>
                                                <input type="text" class="form-control" id="puerto"  required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                             <div class="row justify-content-between">
                                                  <div class="col-auto col-6">
                                                  <button type="submit" id="btnGuardar" class="btn app-btn-primary">Guardar</button>
                                                    </div>
                                                  <div class="col-auto col-6">
                                                       <a class="btn app-btn-secondary" href="#" data-bs-dismiss="modal">Cancelar</a>
                                                   </div>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            </form>
                        </div>
                    </div>
                </div>
                
               <!--Termina modal de editar ruta de red-->
                    
                <!-- Modal Registro de Rutas -->
                <div class="modal fade" id="modalCrearRutaRed" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title1 fs-5" id="staticBackdropLabel">Asignar ruta de red</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="settings-form" id="formRutaRed">
                               <div class="modal-body">
                                <div class="col-12 col-md-12">
                                        <div class="row justify-content-between">    
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">VLAN</label>
                                                    <select class="form-select" aria-label="Default select example" id="vlan3" required>
                                                        <option >Seleccionar VLAN...</option>
                                                        <?php  
                                                        getVlan();
                                                        ?>
                                                    </select>    
                                            </div>  
                                        </div>
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Segmento</label>
                                                    <select class="form-select" aria-label="Default select example" id="segmento3" required>
                                                        <option >Seleccionar segmento...</option>
                                                        <?php
                                                        getSegmentos();
                                                        ?>
                                                    </select>    
                                            </div>      
                                            <div class="col-6 mb-3">
                                                    <div class="mb-3">
                                                        <label for="setting-input-1" class="form-label">Nodo<span class="ms-2"
                                                            data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                                            data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                        </label>
                                                        <input type="text" class="form-control" id="nodo3"  required>
                                                    </div>  
                                            </div>  
                                        </div>
                                        <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Panel de Parcheo</label>
                                                    <select class="form-select" id="panel3" aria-label="Default select example"  required>
                                                        <option>Seleccionar panel...</option>
                                                        <?php
                                                            getParcheo();
    	                                                ?>
                                                    </select>    
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Puerto del panel</label>
                                                <input type="text" class="form-control" id="puerto3"  required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                             <div class="row justify-content-between">
                                                  <div class="col-auto col-6">
                                                  <button type="submit" id="btnGuardar" class="btn app-btn-primary">Guardar</button>
                                                    </div>
                                                  <div class="col-auto col-6">
                                                       <a class="btn app-btn-secondary" href="#" data-bs-dismiss="modal">Cancelar</a>
                                                   </div>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            </form>
                        </div>
                    </div>
                </div>
               <!--Termina modal de agregar ruta de red-->

                <!-- Modal Mostrar equipos-->
                <div class="modal fade" id="modalEquiposAsignados" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Equipos Agregados</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                           <form class="settings-form" >
                                              <div class="modal-body">
                                              <input id="id" type="hidden" name="id">
                                                  <div class="col-12 col-md-12">
                                                  <table class="table mb-0 text-left">
                                                  <thead>
                                                      <tr>
                                                          <th class="cell">Folio del equipo</th>
                                                          <th class="cell">IP del equipo</th>
                                                      </tr>
                                                  </thead>
                                                        <tbody>
                                                                <?php
                                                                 $conect = mysqli_connect("localhost","root","","sistema_urse");
                                                                 $conect->set_charset("utf8");
                                                                 $sql= "SELECT * from equipos_c WHERE rutaRed_eqc=24";
                                                                 $getIns=mysqli_query($conect,$sql);
                                                                 if($getIns->num_rows >0){
                                                                     while($row=mysqli_fetch_array($getIns)){    
                                                                 ?>
                                                                <tr>
                                                                 <th><?php echo $row['folio_eqc'] ?></th>
                                                                 <th><?php echo $row['ip_eqc'] ?></th>
                                                                 <?php
                                                                     }
                                                                 }
                                                                ?>
                                                        </tbody>
                                              </table>           
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <div class="row justify-content-between">
                                                      <div class="col-auto col-6">
                                                          <a class="btn app-btn-secondary" href="#" data-bs-dismiss="modal">Cerrar</a>
                                                      </div>
                                                  </div>
                                              </div>
                                         </form>
                                    </div>
                                </div>
                            </div>
                           <!--Termina modal de equipos asignados-->
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                    </div>
                   
                </div>

                <!-- Tabla-->
                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all"
                        role="tab" aria-controls="orders-all" aria-selected="true">Todas las rutas</a>
                </nav>

                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table id="datos_ruta" class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Nodo</th>
                                                <th class="cell">Panel de Parcheo</th>
                                                <th class="cell">Puerto del panel</th>
                                                <th class="cell">Segmento</th>
                                                <th class="cell">Núm. Segmento</th>
                                                <th class="cell">VLAN</th>
                                                <th class="cell">Detalles</th>
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
                                                <td class="cell">#15346</td>
                                                <td class="cell"><span class="truncate">Lorem ipsum dolor sit amet eget volutpat
                                                        erat</span></td>
                                                <td class="cell">John Sanders</td>
                                                <td class="cell"><span>17 Oct</span><span class="note">2:16 PM</span></td>
                                                <td class="cell"><span class="badge bg-success">Paid</span></td>
                                                <td class="cell">$259.35</td>
                                                <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="cell">#15344</td>
                                                <td class="cell"><span class="truncate">Pellentesque diam imperdiet</span></td>
                                                <td class="cell">Teresa Holland</td>
                                                <td class="cell"><span class="cell-data">16 Oct</span><span class="note">01:16 AM</span>
                                                </td>
                                                <td class="cell"><span class="badge bg-success">Paid</span></td>
                                                <td class="cell">$123.00</td>
                                                <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                            </tr>

                                            <tr>
                                                <td class="cell">#15343</td>
                                                <td class="cell"><span class="truncate">Vestibulum a accumsan lectus sed mollis
                                                        ipsum</span></td>
                                                <td class="cell">Jayden Massey</td>
                                                <td class="cell"><span class="cell-data">15 Oct</span><span class="note">8:07 PM</span>
                                                </td>
                                                <td class="cell"><span class="badge bg-success">Paid</span></td>
                                                <td class="cell">$199.00</td>
                                                <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                            </tr>


                                            <tr>
                                                <td class="cell">#15341</td>
                                                <td class="cell"><span class="truncate">Morbi vulputate lacinia neque et
                                                        sollicitudin</span></td>
                                                <td class="cell">Raymond Atkins</td>
                                                <td class="cell"><span class="cell-data">11 Oct</span><span class="note">11:18 AM</span>
                                                </td>
                                                <td class="cell"><span class="badge bg-success">Paid</span></td>
                                                <td class="cell">$678.26</td>
                                                <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                            </tr>

                                        </tbody>
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

    <!-- Javascript -->
 
<!-- Javascript -->
    <script src="../../assets/plugins/popper.min.js"></script>
    <script type="text/javascript" src="rutaRedController2.js"></script> 


    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="rutaRedController2.js"></script> 

    <!--Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="../../js/sweetAlert.js"></script>

    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/chart.js/chart.min.js"></script>
    <script src="../../assets/js/app.js"></script>	
</body>

</html>