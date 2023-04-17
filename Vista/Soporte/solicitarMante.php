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
    <link id="theme-style" rel="stylesheet" href="../../assets/css/validaciones.css">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	
    <script defer src="../../assets/plugins/fontawesome/js/all.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <script src="../../js/funcionesMant.js"></script>
    <link rel="stylesheet" href="../../assets/css/funcionesSolicitarMant.css">


    <style type="text/css"> li { cursor: pointer; } </style>
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

    <!--Contenido-->
	<div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl" id="">
            <h1 class="app-page-title">Solicitar mantenimiento</h1>
              <hr class="mb-4">
             <!-- BOTONES AGREGAR DATOS ADMINISTRATIVOS Y PERSONAL -->
             <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0"></h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto"> </div>
                                <div class="col-auto">
                                    <button  type="button" class="btn app-btn-secondary" onclick="finalizarmant();"> <!-- id="limpiarCampos" -->
                                        Finalizar mantenimientos
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                    <!-- MultiStep Form -->
                    <!-- <div class=""> -->
                        <!-- <div class=""> -->
                            <!-- <div class=""> -->
                                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                    <div class="row">
                                        <div class="col-md-12 mx-0">
                                            <form   id="msform">
                                                <!-- progressbar -->
                                                <ul id="progressbar">
                                                    <li class="active" id="personal"><strong>Solicitante</strong></li>
                                                    <li id="equipo"><strong>Equipo</strong></li>
                                                    <li id="account"><strong>Observaciones</strong></li>
                                                    <li id="payment"><strong>Datos</strong></li>
                                                    <li id="finish"><strong>Confirmar</strong></li>
                                                </ul><br>

                                                <!-- fieldsets -->
                                                <fieldset> <!-- PANTALLA 1 - Num de Trabajador / Agregar nuevo Administrativo /-->
                                                    <div class="row justify-content-between" >
                                                        <div class="col-1 mb-3"></div>                                                    
                                                        <div class="col-5 mb-3">
                                                            <label for="setting-input-1" class="form-label">Num. de Trabajador (Solicitante)<span class="ms-2"
                                                                    data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top">
                                                            </label>
                                                            <input  type="text" id="id" value="id"  disabled hidden> 
                                                            <input type="text" class="form-control" name="campo" id="campo">
                                                            <ul class="dropdown-menu"  id="lista"></ul>
                                                        </div> 
                                                        <div class="col-6 mb-3">
                                                            <div class="container text-center">
                                                                <div class="row row-cols-1">
                                                                    <div class="col">
                                                                        <label for="setting-input-1" class="form-label">Opciones<span class="ms-2"
                                                                            data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top">
                                                                        </label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <a class="btn app-btn-secondary" onclick="limpiar()" value="Enviar!">limpiar</a>
                                                                        <a class="btn app-btn-secondary" id="limpiarCampos3" data-bs-toggle="modal" data-bs-target="#modalNuevoSolicitante" >Registrar nuevo solicitante</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                    <input type="button" id="next1" name="next" class="next action-button btn" value="Siguiente" disabled/>
                                                
                                                </fieldset>

                                                <fieldset> <!-- PANTALLA 2 - Tipo de soporte / Folio del equipo que entra a mantenimiento-->
                                                    <div class="row justify-content-between">
                                                        <div class="col-1 mb-3"></div>
                                                        <div class="col-10 mb-3">
                                                            <div class="container text-center">
                                                                <div class="row row-cols-2">
                                                                    <div class="col">
                                                                        <label for="setting-input-2" class="form-label">Tipo de Soporte </label>
                                                                        <select class="form-select" name="tipo_mant" id="tipo_mant"  aria-label="Default select example">
                                                                            <option selected disabled value="">Seleccionar</option>
                                                                            <option value="Mantenimiento">Mantenimiento</option>
                                                                            <option value="Red">Red</option>
                                                                        </select> 
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="setting-input-1" class="form-label">Folio del equipo<span class="ms-2"
                                                                            data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top">
                                                                        </label>
                                                                        <input type="text" class="form-control" name="ideqc" id="ideqc" disabled hidden >
                                                                        <input type="text" class="form-control" name="campoeqc" id="campoeqc">  
                                                                            <ul class="dropdown-menu"  id="listaeqc"></ul>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                        <div class="col-1 mb-3"></div>  
                                                    </div>
                                                    <input type="button" name="previous" class="previous action-button-previous" value="Regresar"/>
                                                    <input type="button" id="next2" name="next" class="next action-button" Onclick="nextequipo()" value="Siguiente"/>
                                                </fieldset>

                                                <fieldset> <!-- PANTALLA 3 - Observaciones por el cual el equipo ingresa a mantenimiento-->
                                                    <div class="row justify-content-between">
                                                        <div class="col-2 mb-3"></div>
                                                        <div class="col-8 mb-3">    
                                                            <label for="setting-input-1" class="form-label">Observaciones<span class="ms-2"
                                                                data-container="body" data-bs-toggle="popover" data-trigger="hover" ></label>
                                                            <div class="form-floating">
                                                                <textarea class="form-control"  name="observaeqc" id="observaeqc" style="height: 100px"></textarea>
                                                                <input type="datetime" class="form-control" name="fechaeqc" id="fechaeqc" value="<?php echo $fecha_actual ?>" disabled hidden>
                                                            </div>   
                                                        </div> 
                                                        <div class="col-2 mb-3"></div>  
                                                    </div>
                                                    <input type="button" name="previous" class="previous action-button-previous" value="Regresar"/>
                                                    <input type="button" name="next" class="next action-button" Onclick="nextobservaciones()" value="Siguiente"/> 
                                                </fieldset>

                                                <fieldset> <!-- pantalla 4-->
                                                    <div class="row">
                                                        <div class="col-1 mb-3"></div>
                                                        <div class="col-10 mb-3"> 
                                                            <div class="container text-start">
                                                                <div class="row row-cols-2">
                                                                    <div class="col">
                                                                        <h5 class="section-title">Datos del solicitante</h5><br>
                                                                        <div class=" mb-2"><strong>Nombre solicitante: </strong> <input type="text" id="name"  style="border:none; outline: none; background-color: #FFFFFF;" disabled> </div>
                                                                        <div class=" mb-2"><strong>Apellido Paterno: </strong> <input  type="text" id="ap"style="border:none; outline: none; background-color: #FFFFFF;"  disabled> </div>
                                                                        <div class="mb-2"><strong>Tipode personal: </strong> <input  type="text" id="tipo" style="border:none; outline: none; background-color: #FFFFFF;"  disabled></div>	
                                                                        <div class="mb-2"><strong>Matrícula solicitante: </strong><input type="text" id="ntrabajador" style="border:none; outline: none; background-color: #FFFFFF;"  disabled></div>
                                                                        <div class="mb-2"><strong>Área: </strong><input  type="text" id="area" style="border:none; outline: none; background-color: #FFFFFF;"  disabled></div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h5 class="section-title">Datos del servicio</h5><br>
                                                                        <div class="mb-2"><strong>Tipo de soporte:</strong><input  type="text" id="tipo_s"style="border:none; outline: none; background-color: #FFFFFF;"  disabled ></div>
                                                                        <div class="mb-2"><strong>Fecha: </strong><input  type="text" id="fecha_i" style="border:none; outline: none; background-color: #FFFFFF;"  disabled ></div>	
                                                                        <div class="mb-2"><strong>Equipo: </strong><input  type="text" id="equipo_eqc" style="border:none; outline: none; background-color: #FFFFFF;"  disabled ></div>
                                                                        <div class="mb-2"><strong>Observaciones: </strong><input  type="text" id="observaciones_eqc" style="border:none; outline: none; background-color: #FFFFFF;"  disabled ></div> <!-- "addMant_user" checar donde poner esto forms-->
                                                                    </div>                                                                    
                                                                </div> 
                                                            </div>
                                                        </div> 
                                                        <div class="col-1 mb-3"></div>  
                                                    </div>
                                                    <input type="button" name="previous" class="previous action-button-previous" value="Regresar"/>
                                                    <button type="submit" name="next" class="next action-button" >Confirmar</button>
                                                </fieldset>
                                            
                                                <fieldset><!-- pantalla 5-->
                                                    <div class="form-card">
                                                    <br><br>    
                                                        <h3 class="fs-title text-center">La solicitud del Soporte se a registrado!</h3>
                                                        <div class="row justify-content-center">
                                                            <div class="col-3">
                                                                <!--<img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">-->
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                    </div>
                                                    <button  type="button" class="next action-button" onclick="inicio();"> Inicio</button>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                        <!-- </div> -->
                    <!-- </div> -->


                    
                <!--******************************************************************************************************-->
                <!-- MODAL AGREGAR DATOS DE USUARIO -->
                <div class="modal fade" id="modalNuevoSolicitante" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                            <form id="addUser" class="settings-form">
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                        <label for="addnombre_ad" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" id="addnombre_ad" placeholder="Nombre">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="addapellidoP_ad" class="form-label">Apellido
                                                            paterno</label>
                                                        <input type="text" class="form-control" id="addapellidoP_ad" placeholder="Apellido Paterno">
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-6 mb-3">
                                                        <label for="addapellidoM_ad" class="form-label">Apellido
                                                            Materno</label>
                                                        <input type="text" class="form-control" id="addapellidoM_ad" placeholder="Apellido materno">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="addnTrabajador_ad" class="form-label">N. Trabajador</label>
                                                        <input type="text" class="form-control" id="addnTrabajador_ad" placeholder="N. Trabajador">
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-12 mb-3">
                                                        <label for="addarea_ad" class="form-label">Área</label>

                                                        <select class="form-select" name="addarea_ad" id="addarea_ad" required>
                                                        <option selected disabled value="">Seleccionar Área</option>
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

                                                

                                                <div class="modal-footer">
                                                    <div class="row justify-content-between">
                                                        <div class="col-auto col-6">
                                                            <button type="submit" class="btn app-btn-primary"> Registrar</button>
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
                <!--******************************************************************************************************-->
			</div>
	    </div>
    </div>				
    <script>
        //primer pantalla solicitar mantenimiento


    </script>
    <!-- Javascript -->
    <script src="../../assets/plugins/popper.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/chart.js/chart.min.js"></script>
    <script src="../../assets/js/app.js"></script>	
    <script src="inc/peticionesMant.js"></script>
    
    <!-- MultiStep Form -->
    <script src="../../js/MultistepMantenimiento.js"></script>

    <!-- Validaciones -->
    <!-- <script src="../../js/validaciones.js"></script> -->
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>