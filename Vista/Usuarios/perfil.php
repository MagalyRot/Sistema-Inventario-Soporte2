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
        <?php require("navbarUsuarios.php");?><!-- Navbar -->
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <?php require("menuUsuarios.php");?> <!-- Menu lateral -->
        </div>
    </header>

    <!--Contenido-->
	<div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl" id="">
			<h1 class="app-page-title">Perfil</h1>
				<div class="row gy-4">
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
											</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Perfil</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4 w-100">
							    
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Nombre</strong></div>
									        <div class="item-data">Abel Magdiel</div>
									    </div><!--//col-->
									    <div class="col text-end">
										    <!--<a class="btn-sm app-btn-secondary" href="#"></a>-->
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
                                <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Apellidos</strong></div>
									        <div class="item-data"> Smith Martínez</div>
									    </div><!--//col-->
									    <div class="col text-end">
										    <!-- <a class="btn-sm app-btn-secondary" href="#"></a>-->
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Email</strong></div>
									        <div class="item-data">sistemas@urse.edu.mx</div>
									    </div><!--//col-->
									    <div class="col text-end">
										    <!-- <a class="btn-sm app-btn-secondary" href="#"></a>-->
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
							    
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Estado</strong></div>
									        <div class="item-data">
										        Activo
									        </div>
									    </div><!--//col-->
									    <div class="col text-end">
										    <!-- <a class="btn-sm app-btn-secondary" href="#"></a> -->
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
						    </div><!--//app-card-body-->
						    <div class="app-card-footer p-4 mt-auto">
							   <a class="btn app-btn-secondary" href="#">Editar Perfil</a>
						    </div><!--//app-card-footer-->
						   
						</div><!--//app-card-->
	                </div><!--//col-->
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
												</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Preferencias</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4 w-100">
							    
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Contraseña</strong></div>
									        <div class="item-data">****************</div>
									    </div><!--//col-->
									    <div class="col text-end">
										    <!-- <a class="btn-sm app-btn-secondary" href="#">Change</a> -->
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Área</strong></div>
									        <div class="item-data">Departamento de sistemas</div>
									    </div><!--//col-->
									    <div class="col text-end">
										    <!-- <a class="btn-sm app-btn-secondary" href="#">Change</a>-->
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Campus</strong></div>
									        <div class="item-data">Áleman</div>
									    </div><!--//col-->
									    <div class="col text-end">
										    <!-- <a class="btn-sm app-btn-secondary" href="#">Change</a> -->
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
							    
						    </div><!--//app-card-body-->
						    <div class="app-card-footer p-4 mt-auto">
							   <a class="btn app-btn-secondary" href="#">Editar preferencias</a>
						    </div><!--//app-card-footer-->
						   
						</div><!--//app-card-->
	                </div><!--//col-->

                </div><!--//row-->			    
				
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
