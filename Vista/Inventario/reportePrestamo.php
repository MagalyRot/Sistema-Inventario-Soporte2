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
                <h1 class="app-page-title">Reporte de Prestamos</h1>
                <hr class="mb-4">
                
			    <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Día</a>
				    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Mes</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Año</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Libre</a>
				</nav><br>

                <div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
                                    <div class="row g-4 settings-section">                  
                                        <div class="col-12 col-md-12">
                                            <div class="app-card app-card-settings shadow-sm p-4">
                                                <div class="app-card-body">
                                                    <form class="settings-form">
                                                        <div class="row justify-content-between">
                                                            <div class="col-3 mb-3">
                                                                <label for="setting-input-1" class="form-label">Día<span class="ms-2"
                                                                    data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                                                    data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                                </label>
                                                                <input type="date" class="form-control" id="setting-input-1" value="" required>
                                                            </div>

                                                            <div class="col-3 mb-3">
                                                                <label for="setting-input-2" class="form-label">Prestamos realizados por</label>
                                                                <select class="form-select" aria-label="Default select example">
                                                                    <option selected>Todos</option>
                                                                    <option value="1">Marco Antonio</option>
                                                                    <option value="1">Jesús Santaella</option>
                                                                </select>    
                                                            </div>  
                                                            <div class="col-3 mb-3"></div>
                                                            <div class="col-3 mb-3">
                                                                <label for="setting-input-2" class="form-label"></label>
                                                                <div class="col-auto">
                                                                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                                                        <div class="col-auto">						    
                                                                            <a class="btn app-btn-secondary" href="#">Generar reporte</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    
                                                </div><hr>
                                                <div class="row justify-content-between">
                                                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                                        <div class="col-auto">						    
                                                            <a class="btn app-btn-secondary" href="#">
                                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                                <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                                </svg>
                                                                Descargar PDF
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="table-responsive">
                                                            <table class="table app-table-hover mb-0 text-left">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="cell">id</th>
                                                                        <th class="cell">Fecha</th>
                                                                        <th class="cell">Solicitante</th>
                                                                        <th class="cell">Prestamos realizados</th>
                                                                        <th class="cell">Encargado</th>
                                                                        <th class="cell">Equipo</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="cell">#15346</td>
                                                                        <td class="cell">07/04/2023</td>
                                                                        <td class="cell">Marco Antonio</td>
                                                                        <td class="cell">Jesús Santaella</td>
                                                                        <td class="cell">Magdiel Smith</td>
                                                                        <td class="cell">URSE2023-150</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
			        </div><!--//tab-pane-->
			        
			        <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
                                <div class="row g-4 settings-section">                  
                                    <div class="col-12 col-md-12">
                                            <div class="app-card app-card-settings shadow-sm p-4">
                                                <div class="app-card-body">
                                                    <form class="settings-form">
                                                        <div class="row justify-content-between">
                                                            <div class="col-3 mb-3">
                                                                <label for="setting-input-2" class="form-label">Mes</label>
                                                                <select class="form-select" aria-label="Default select example">
                                                                    <option selected="1">Enero</option>
                                                                    <option value="2">Febrero</option>
                                                                    <option value="3">Marzo</option>
                                                                    <option value="4">Abril</option>
                                                                    <option value="5">Mayo</option>
                                                                    <option value="6">Junio</option>
                                                                    <option value="7">Julio</option>
                                                                    <option value="7">Agosto</option>
                                                                    <option value="8">Septiembre</option>
                                                                    <option value="9">Octubre</option>
                                                                    <option value="10">Noviembre</option>
                                                                    <option value="1">diciembre</option>
                                                                </select>    
                                                            </div>
                                                            <div class="col-3 mb-3">
                                                                <label for="setting-input-2" class="form-label">Año</label>
                                                                <select class="form-select" aria-label="Default select example">
                                                                    <option selected="1">2022</option>
                                                                    <option value="2">2023</option>
                                                                </select>    
                                                            </div>
                                                            <div class="col-3 mb-3">
                                                                <label for="setting-input-2" class="form-label">Prestamos realizados por</label>
                                                                <select class="form-select" aria-label="Default select example">
                                                                    <option selected>Todos</option>
                                                                    <option value="1">Marco Antonio</option>
                                                                    <option value="1">Jesús Santaella</option>
                                                                </select>    
                                                            </div>  
                                                            <div class="col-3 mb-3">
                                                                <label for="setting-input-2" class="form-label"></label>
                                                                <div class="col-auto">
                                                                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                                                        <div class="col-auto">						    
                                                                            <a class="btn app-btn-secondary" href="#">Generar reporte</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div><hr>
                                                <div class="row justify-content-between">
                                                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                                        <div class="col-auto">						    
                                                            <a class="btn app-btn-secondary" href="#">
                                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                                <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                                </svg>
                                                                Descargar PDF
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="table-responsive">
                                                            <table class="table app-table-hover mb-0 text-left">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="cell">id</th>
                                                                        <th class="cell">Fecha</th>
                                                                        <th class="cell">Solicitante</th>
                                                                        <th class="cell">Prestamos realizados por</th>
                                                                        <th class="cell">Encargado</th>
                                                                        <th class="cell">Equipo</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="cell">#15346</td>
                                                                        <td class="cell">07/04/2023</td>
                                                                        <td class="cell">Marco Antonio</td>
                                                                        <td class="cell">Jesús Santaella</td>
                                                                        <td class="cell">Magdiel Smith</td>
                                                                        <td class="cell">URSE2023-150</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>        
                                                </div>
                                            </div>
                                    </div>
                                </div>
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
			        </div><!--//tab-pane-->
			        
			        <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
                                <div class="row g-4 settings-section">                  
                                    <div class="col-12 col-md-12">
                                            <div class="app-card app-card-settings shadow-sm p-4">
                                                <div class="app-card-body">
                                                    <form class="settings-form">
                                                        <div class="row justify-content-between">
                                                            <div class="col-3 mb-3">
                                                                <label for="setting-input-2" class="form-label">Año</label>
                                                                <select class="form-select" aria-label="Default select example">
                                                                    <option selected="1">2022</option>
                                                                    <option value="2">2023</option>
                                                                </select>    
                                                            </div>
                                                            <div class="col-3 mb-3">
                                                                <label for="setting-input-2" class="form-label">Prestamos realizados por</label>
                                                                <select class="form-select" aria-label="Default select example">
                                                                    <option selected>Todos</option>
                                                                    <option value="1">Marco Antonio</option>
                                                                    <option value="1">Jesús Santaella</option>
                                                                </select>    
                                                            </div>  
                                                            <div class="col-3 mb-3"></div>
                                                            <div class="col-3 mb-3">
                                                                <label for="setting-input-2" class="form-label"></label>
                                                                <div class="col-auto">
                                                                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                                                        <div class="col-auto">						    
                                                                            <a class="btn app-btn-secondary" href="#">Generar reporte</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    
                                                </div><hr>
                                                <div class="row justify-content-between">
                                                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                                        <div class="col-auto">						    
                                                            <a class="btn app-btn-secondary" href="#">
                                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                                <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                                </svg>
                                                                Descargar PDF
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="table-responsive">
                                                            <table class="table app-table-hover mb-0 text-left">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="cell">id</th>
                                                                        <th class="cell">Fecha</th>
                                                                        <th class="cell">Solicitante</th>
                                                                        <th class="cell">Prestamos realizados por</th>
                                                                        <th class="cell">Encargado</th>
                                                                        <th class="cell">Equipo</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="cell">#15346</td>
                                                                        <td class="cell">07/04/2023</td>
                                                                        <td class="cell">Marco Antonio</td>
                                                                        <td class="cell">Jesús Santaella</td>
                                                                        <td class="cell">Magdiel Smith</td>
                                                                        <td class="cell">URSE2023-150</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>        
                                                </div>
                                            </div>
                                    </div>
                                </div>
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
			        </div><!--//tab-pane-->

			        <div class="tab-pane fade" id="orders-cancelled" role="tabpanel" aria-labelledby="orders-cancelled-tab">
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
                            <div class="row g-4 settings-section">                  
                                    <div class="col-12 col-md-12">
                                            <div class="app-card app-card-settings shadow-sm p-4">
                                                <div class="app-card-body">
                                                    <form class="settings-form">
                                                        <div class="row justify-content-between">
                                                            <div class="col-3 mb-3">
                                                                <label for="setting-input-1" class="form-label">Fecha inicial<span class="ms-2"
                                                                    data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                                                    data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                                </label>
                                                                <input type="date" class="form-control" id="setting-input-1" value="" required>
                                                            </div>
                                                            <div class="col-3 mb-3">
                                                                <label for="setting-input-1" class="form-label">Fecha final<span class="ms-2"
                                                                    data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                                                    data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                                </label>
                                                                <input type="date" class="form-control" id="setting-input-1" value="" required>
                                                            </div>
                                                            <div class="col-3 mb-3">
                                                                <label for="setting-input-2" class="form-label">Prestamos realizados por</label>
                                                                <select class="form-select" aria-label="Default select example">
                                                                    <option selected>Todos</option>
                                                                    <option value="1">Marco Antonio</option>
                                                                    <option value="1">Jesús Santaella</option>
                                                                </select>    
                                                            </div>  
                                                            <div class="col-3 mb-3">
                                                                <label for="setting-input-2" class="form-label"></label>
                                                                <div class="col-auto">
                                                                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                                                        <div class="col-auto">						    
                                                                            <a class="btn app-btn-secondary" href="#">Generar reporte</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    
                                                </div><hr>
                                                <div class="row justify-content-between">
                                                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                                        <div class="col-auto">						    
                                                            <a class="btn app-btn-secondary" href="#">
                                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                                <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                                </svg>
                                                                Descargar PDF
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="table-responsive">
                                                            <table class="table app-table-hover mb-0 text-left">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="cell">id</th>
                                                                        <th class="cell">Fecha</th>
                                                                        <th class="cell">Solicitante</th>
                                                                        <th class="cell">Prestamos realizados por</th>
                                                                        <th class="cell">Encargado</th>
                                                                        <th class="cell">Equipo</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="cell">#15346</td>
                                                                        <td class="cell">07/04/2023</td>
                                                                        <td class="cell">Marco Antonio</td>
                                                                        <td class="cell">Jesús Santaella</td>
                                                                        <td class="cell">Magdiel Smith</td>
                                                                        <td class="cell">URSE2023-150</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>        
                                                </div>
                                            </div>
                                    </div>
                                </div>
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
			        </div><!--//tab-pane-->
				</div><!--//tab-content-->
			</div>
	    </div>
    </div>				

    <!-- Javascript -->
    <script src="../../assets/plugins/popper.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/chart.js/chart.min.js"></script>
    <script src="../../assets/js/app.js"></script>		
</body>

</html>