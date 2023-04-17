<!DOCTYPE html>
<html lang="en">

<head>
    <title>Restablecer contraseña</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href=>
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="../assets/css/sistemaIS.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	
    <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css">
    <!-- Extension responsiva-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.css">   

</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href=""><img class="logo-icon me-2" src="../assets/images/logo-urse.png" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-5">Restablecer contraseña</h2>
                    <!-- Tabla-->
                    <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                        <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Correo electrónico</a>
                        <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Número de trabajador</a>


                    </nav>
                    <div class="tab-content" id="orders-table-tab-content">
                        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                            <div class="app-card app-card-orders-table shadow-sm mb-5">
                                <div class="app-card-body">
                                    <div class="auth-form-container text-start">

                                        <form action="../Controlador/loginController.php" method="POST">
                                            <div class="email mb-3">
                                                <center>
                                                    <p>Ingresa tu correo electrónico para restablecer tu contraseña</p>
                                                </center>
                                                <input id="correo" name="correo" type="email" class="form-control signin-email" placeholder="Ingresa tu correo electrónico" required="required">
                                            </div>
                                            <!--//form-group-->
                                            <div class="text-center">
                                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Restablecer</button>
                                            </div>
                                        </form>
                                        <div class="auth-option text-center pt-5"><a class="text-link" href="../Vista/login.php">Iniciar Sesión</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                            <div class="app-card app-card-orders-table mb-5">
                                <div class="app-card-body">
                                    <div class="auth-form-container text-start">

                                        <form action="../Controlador/loginController.php" method="POST">
                                            <div class="email mb-3">
                                                <center>
                                                    <p>prueba</p>
                                                </center>
                                                <input id="correo" name="correo" type="email" class="form-control signin-email" placeholder="Ingresa tu correo electrónico" required="required">
                                            </div>
                                            <!--//form-group-->
                                            <div class="text-center">
                                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Restablecer</button>
                                            </div>
                                        </form>
                                        <div class="auth-option text-center pt-5"><a class="text-link" href="../Vista/login.php">Iniciar Sesión</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <div class="h-100"></div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
 
    
    <!-- Javascript -->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/chart.js/chart.min.js"></script>
    <script src="../../assets/js/app.js"></script>
</body>

</html>