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
        <?php require("navbarSoporte.php");?><!-- Navbar -->
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <?php require("menuSoporte.php");?> <!-- Menu lateral -->
        </div>
    </header>

    <!--Contenido-->
	<div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl" id="">

            <h1 class="app-page-title">Solicitar mantenimiento</h1>

                <hr class="mb-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-6">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form class="settings-form">
                                    <div class="mb-3">
                                        <label for="setting-input-1" class="form-label">Matrícula del solicitante<span class="ms-2"
                                            data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                            data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                        </label>
                                        <input type="text" class="form-control" id="setting-input-1" value="Ingrese la matrícula del solicitante" required>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <a class="btn app-btn-primary" href="#">Agregar solicitante</a>
                                        </div>
                                        <div class="col-auto">
                                            <a class="btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#modalNuevoSolicitante" >Registrar nuevo solicitante</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form class="settings-form">
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                            <label for="setting-input-1" class="form-label">Se recibe<span class="ms-2"
                                                data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                                data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                            </label>
                                            <input type="date" class="form-control" id="setting-input-1" value="" required>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="setting-input-1" class="form-label">Estimada de entrega<span class="ms-2"
                                                data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                                data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                            </label>
                                            <input type="date" class="form-control" id="setting-input-1" value="" required>
                                        </div>  
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-6 mb-3">
                                            <label for="setting-input-2" class="form-label">Tipo de Soporte</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Mantenimiento</option>
                                                <option value="1">Red</option>
                                                
                                            </select>    
                                        </div>  
                                        <div class="col-6 mb-3">
                                        <label for="setting-input-1" class="form-label">Folio del equipo<span class="ms-2"
                                            data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                            data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                        </label>
                                        <input type="text" class="form-control" id="setting-input-1" value="Ingrese el folio del equipo" required>
                                    
                                        </div>  
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="mb-3">
                                            <label for="setting-input-1" class="form-label">Observaciones<span class="ms-2"
                                                data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                                data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                            </label>
                                            <input type="text" class="form-control" id="setting-input-1" value="Ingrese la matrícula del solicitante" required>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <a class="btn app-btn-primary" href="#">Guardar datos</a>
                                        </div>
                                        <div class="col-auto">
                                            <a class="btn app-btn-secondary" href="#">Cancelar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modalNuevoSolicitante" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Personal Administrativo</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12 col-md-12">
                                    <form class="settings-form">
                                        <div class="mb-3">
                                            <label for="setting-input-1" class="form-label">Nombre<span class="ms-2"
                                                data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                                data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                            </label>
                                            <input type="text" class="form-control" id="setting-input-1" value="" required>
                                        </div>

                                        <div class="row justify-content-between">
                                            
                                        </div>
                                        <div class="row justify-content-between">
                                        
                                        </div>
                                        <div class="row justify-content-between">
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="row justify-content-between">
                                    <div class="col-auto col-6">
                                        <a class="btn app-btn-primary" href="#">Guardar</a>
                                    </div>
                                    <div class="col-auto col-6">
                                        <a class="btn app-btn-secondary" href="#" data-bs-dismiss="modal">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="mb-4">
                <div class="col-12 col-md-12">
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">
                            <form class="settings-form">
                                <div class="row justify-content-between">
                                    <div class="col-6 mb-3">
                                        <h5 class="section-title">Datos del solicitante</h5><br>
                                        <div class="mb-2"><strong>Departamento:</strong> <span class="badge bg-success">Sistemas y Computación</span></div>	
                                        <div class="mb-2"><strong>Matrícula solicitante:</strong> UTTI192054</div>
                                        <div class="mb-2"><strong>Nombre solicitante:</strong> David Rodríguez </div>
                                        <div class="mb-2"><strong>Escuela:</strong> Medicina</div>


                                    </div>
                                    <div class="col-6 mb-3">
                                        <h5 class="section-title">Datos del servicio</h5><br>
                                        <div class="mb-2"><strong>Tipo de Soporte:</strong> <span class="badge bg-success">Mantenimiento</span></div>
                                        <div class="mb-2"><strong>Se recibe:</strong> 2030-09-24</div>
                                        <div class="mb-2"><strong>Estimado de entrega:</strong> 2030-09-24</div>	
                                        <div class="mb-2"><strong>Folio del equipo:</strong>URSE2023C125</div>
                                        <div class="mb-2"><strong>Observaciones:</strong> El equipo no enciende</div>
                                    </div>  
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-6 mb-3"></div>
                                        <div class="col-6 mb-3">
                                            <div class="row justify-content-between">
                                            <div class="col-auto">
                                                <a class="btn app-btn-primary" href="#">Confirmar servicio</a>
                                            </div>
                                            <div class="col-auto">
                                                <a class="btn app-btn-secondary" href="#">Cancelar</a>
                                            </div>
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

    <!-- Javascript -->
 
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/chart.js/chart.min.js"></script>
    <script src="../../assets/js/app.js"></script>		
</body>

</html>