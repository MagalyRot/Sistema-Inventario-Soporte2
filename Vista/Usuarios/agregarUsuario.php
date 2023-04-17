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
            <h1 class="app-page-title">Agregar usuario</h1>
                <hr class="mb-4">

                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all"
                        role="tab" aria-controls="orders-all" aria-selected="true">Personal</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid"
                        role="tab" aria-controls="orders-paid" aria-selected="false">Administrativo</a>
                </nav>

                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <div class="app-content pt-3 p-md-3 p-lg-4">
                                                    <div class="container-xl">
                                                        <div class="row g-4 settings-section">
                                                            <div class="col-12 col-md-2">
                                                                <h3 class="section-title text-center">Personal</h3>
                                                                <div class="section-intro text-center">
                                                                    Este tipo de usuario tendrá que registrar su correo electronico y
                                                                    asignar una contraseña para poder ingresar al sistema.
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-10">
                                                                <div class="app-card app-card-settings shadow-sm p-4">
                                                                    <div class="app-card-body">
                                                                        <form id="" class="settings-form">
                                                                            <div class="row justify-content-between">
                                                                                <div class="col-12 mb-3">
                                                                                    <label for="setting-input-2" class="form-label">Rol</label>  
                                                                                    <select class="form-select" aria-label="Default select example" placeholder>
                                                                                        <option selected>Mantenimiento</option>
                                                                                        <option value="1">Soporte de redes</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row justify-content-between">
                                                                                <div class="col-6 mb-3">
                                                                                    <label for="formGroupExampleInput" class="form-label">Nombre</label>                                      
                                                                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nombre">      
                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <label for="formGroupExampleInput6" class="form-label">Apellido paterno</label>        
                                                                                    <input type="text" class="form-control" id="formGroupExampleInput6" placeholder="Apellido Paterno">     
                                                                                </div>
                                                                            </div>
                                                                            <div class="row justify-content-between">
                                                                                <div class="col-6 mb-3">
                                                                                    <label for="formGroupExampleInput7" class="form-label">Apellido Materno</label>
                                                                                    <input type="text" class="form-control" id="formGroupExampleInput7" placeholder="Apellido materno">
                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <label for="setting-input-2" class="form-label">Estado</label>  
                                                                                    <select class="form-select" aria-label="Default select example">
                                                                                        <option selected>Activo</option>
                                                                                        <option value="1">Inactivo</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row justify-content-between">
                                                                                <div class="col-6 mb-3">
                                                                                    <label for="inputEmail4" class="form-label">Email</label>
                                                                                    <input type="email" class="form-control" id="inputEmail4"> 
                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <label for="inputPassword4" class="form-label">Password</label>  
                                                                                    <input type="password" class="form-control" id="inputPassword4">     
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                        <div class="app-card app-card-orders-table mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <div class="container ">
                                        <div class="row">
                                            <div class="col">
                                                <div class="app-content pt-3 p-md-3 p-lg-4">
                                                    <div class="container-xl">
                                                        <div class="row g-4 settings-section">
                                                            <div class="col-12 col-md-2">
                                                                <h3 class="section-title text-center">Administrativo</h3>
                                                                <div class="section-intro text-center">
                                                                    Este tipo de usuario solo será agregado para poder solicitar
                                                                    prestamos o mantenimientos, al igual que se le podrá asignar equipos
                                                                    o artículos.
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-10">
                                                                <div class="app-card app-card-settings shadow-sm p-4">
                                                                    <div class="app-card-body">
                                                                        <form id="addUser" class="settings-form">
                                                                            <div class="row justify-content-between">
                                                                                <div class="col-6 mb-3">
                                                                                    <label for="formGroupExampleInput" class="form-label">Nombre</label>
                                                                                    <input type="text" class="form-control"id="addnombre_ad" placeholder="Nombre">
                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <label for="formGroupExampleInput3" class="form-label">Apellido paterno</label>
                                                                                    <input type="text" class="form-control" id="addapellidoP_ad" placeholder="Apellido Paterno">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row justify-content-between">
                                                                                <div class="col-6 mb-3">
                                                                                    <label for="formGroupExampleInput4" class="form-label">Apellido Materno</label> 
                                                                                    <input type="text" class="form-control" id="addapellidoM_ad" placeholder="Apellido materno">                                                                          
                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <label for="formGroupExampleInput2" class="form-label">N. Trabajador</label> 
                                                                                    <input type="text" class="form-control" id="addnTrabajador_ad" placeholder="N. Trabajador">                                                                          
                                                                                </div>
                                                                            </div>
                                                                            <div class="row justify-content-between">
                                                                               
                                                                            </div>
                                                                            <button type="submit" class="btn app-btn-primary"> Registrar</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="../../js/agregar.js"></script>				
</body>

</html>