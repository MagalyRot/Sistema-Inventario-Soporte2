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
	<!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css">
    <!-- Extension responsiva-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.css">  

    <script defer src="../../assets/plugins/fontawesome/js/all.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body class="app">
    <header class="app-header fixed-top">
        <?php require("navbarInventario.php");?><!-- Navbar -->
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <?php require("menuInventario.php");?> <!-- Menu lateral -->
        </div>
    </header>

    <!--Contenido-->
	<div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl" id="">
            <h1 class="app-page-title">Proveedores</h1>

                <hr class="mb-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-3">
                        <h3 class="section-title">Agregar proveedor</h3>
                        <div class="section-intro">Descripción <a href=""></a></div>
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="app-card app-card-settings shadow-sm p-4">
                           <div class="col-auto">
                             <div class="page-utilities">
                               <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                   <!--//col-->
                                   <div class="col-auto">
                                       <!-- Button trigger modal -->
                                       <button id="limpiarCampos" type="button" class="btn app-btn-secondary" data-bs-toggle="modal"
                                           data-bs-target="#modalProveedores">
                                           Agregar Proveedor
                                       </button>
                                   </div>
                               </div>
                             </div>
                           </div>
                        </div>
                    </div>
                </div>
                 <!-- Modal Editar Proveedores-->
                <div class="modal fade" id="modalEditarProveedores" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Proveedor</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                               <form class="settings-form" id="formEditarProveedores">
                                  <div class="modal-body">
                                      <div class="col-12 col-md-12">
                                              <div class="mb-3">
                                                  <input id="id" type="hidden" name="id">
                                                  <label for="formGroupExampleInput" class="form-label">Nombre de la empresa</label>                                      
                                                  <input type="text" id="nombre" class="form-control"  required>                                        
                                              </div> 
                                              <div class="mb-3">
                                                  <label for="formGroupExampleInput" class="form-label">Dirección de la empresa</label>                                      
                                                  <input type="text" id="direccion" class="form-control"  required>                                        
                                              </div> 
                                              <div class="mb-3">
                                                  <label for="formGroupExampleInput" class="form-label">Teléfono de la empresa</label>                                      
                                                  <input type="text" id="telefono" class="form-control"  required>                                        
                                              </div> 
                                              <div class="mb-3">
                                                  <label for="formGroupExampleInput" class="form-label">Correo electrónico de la empresa</label>                                      
                                                  <input type="text" id="email" class="form-control"  required>                                        
                                              </div>
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
                             </form>
                        </div>
                    </div>
                </div>
               <!--Termina modal de registro--> 
                <!-- Modal Agregar Categorías-->
                <div class="modal fade" id="modalProveedores" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Proveedor</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                               <form class="settings-form" id="formProveedores">
                                  <div class="modal-body">
                                      <div class="col-12 col-md-12">
                                              <div class="mb-3">
                                                  <label for="formGroupExampleInput" class="form-label">Nombre de la empresa</label>                                      
                                                  <input type="text" id="nombre1" class="form-control"  required>                                        
                                              </div> 
                                              <div class="mb-3">
                                                  <label for="formGroupExampleInput" class="form-label">Dirección de la empresa</label>                                      
                                                  <input type="text" id="direccion1" class="form-control"  required>                                        
                                              </div> 
                                              <div class="mb-3">
                                                  <label for="formGroupExampleInput" class="form-label">Teléfono de la empresa</label>                                      
                                                  <input type="text" id="telefono1" class="form-control"  required>                                        
                                              </div> 
                                              <div class="mb-3">
                                                  <label for="formGroupExampleInput" class="form-label">Correo electrónico de la empresa</label>                                      
                                                  <input type="text" id="email1" class="form-control"  required>                                        
                                              </div>
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
                             </form>
                        </div>
                    </div>
                </div>
               <!--Termina modal de registro-->               







                <hr class="my-4">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Proveedores</h1>
                    </div>
                   
                </div>
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table id="datos_proveedores" class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Empresa</th>
                                                <th class="cell">Dirección</th>
                                                <th class="cell">Teléfono</th>
                                                <th class="cell">Correo electrónico</th>
                                                <th class="cell">Estado</th>
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

    <!-- Javascript -->

    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="proveedoresController1.js"></script> 

     <!-- sweet Alert -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="../../js/sweetAlert.js"></script>

 
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/chart.js/chart.min.js"></script>
    <script src="../../assets/js/app.js"></script>		
</body>

</html>