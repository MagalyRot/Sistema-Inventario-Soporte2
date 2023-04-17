<!DOCTYPE html>
<html lang="en">

<head>
    <title>Restablecer contraseña</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href=>
    <!--BOOSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- FontAwesome JS-->
    <script defer src="../Assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="../Assets/css/sistemaIS.css">
</head>  

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href=""><img class="logo-icon me-2"
                                src="../assets/images/logo-urse.png" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-2">Restablecer contraseña</h2>
                    <p class="py-3">Ingresa tu correo electrónico o número de trabajor para reestablecer tu contraseña</p>
                    <div class="auth-form-container text-start">
                        <!-- Tabla-->
                        <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                            <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all"
                                role="tab" aria-controls="orders-all" aria-selected="true">Correo electrónico</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid"
                                role="tab" aria-controls="orders-paid" aria-selected="false">Número de trabajador</a>
                        </nav>
                        <div class="tab-content" id="orders-table-tab-content">
                            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
                                    <div class="app-card-body">
                                        <form id="formCorreo">
                                            <div class="email mb-3">
                                                <input id="correo" name="correo" type="email" class="form-control signin-email" placeholder="Ingresa tu correo electrónico" required="required">
                                            </div>
                                            <div class="text-center">
                                                <button id="reestablecer" type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto" >Restablecer</button>
                                            </div>
                                        </form>
                                        <div class="auth-option text-center pt-5"><a class="text-link" href="../Vista/login.php">Iniciar Sesión</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body">
                                        <form id="formNumTrabajador">
                                            <div class="email mb-3">
                                                <input id="numTrabajador" name="numTrabajador" type="text" class="form-control signin-email" placeholder="Ingresa tu número de trabajador" required="required">
                                            </div>
                                            <div class="text-center">
                                                <button id="reestablecer" type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Restablecer</button>
                                            </div>
                                        </form>
                                        <div class="auth-option text-center pt-5"><a class="text-link" href="../Vista/login.php" >Iniciar Sesión</a></div>
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
</body>
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="../Assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../JS/sweetAlert.js"></script>

<script>
     //SUBMIT PARA EL RECUPERAR CONTRASEÑA CON CORREO ELECTRONICO//
     $('#formCorreo').submit(function(e){
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        correo   = document.getElementById("correo").value;
        console.log(correo);
        document.getElementById('reestablecer').disabled = true;
            $.ajax({
                url: "../Controlador/resetPasswordController.php",
                type: "POST",
                datatype:"json",
                data:  {correo:correo},
                success: function(data) {
                    if(data == ""){
                        console.log(data)
                        $("#correo").val("");
                        document.getElementById('reestablecer').disabled = false;
                        Swal.fire({
                            icon: 'error',
                            title: 'Error...',
                            text: 'Este correo no esta asociado a una cuenta'
                        })
                    }else{
                        console.log(data);
                        console.log("correo ennviado");
                        $("#correo").val("");
                        document.getElementById('reestablecer').disabled = false;
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Datos enviandos al correo electrónico',
                            showConfirmButton: false,
                            timer: 1500,
                        })
                    }
                }
            });
    });

    //SUBMIT PARA EL RECUPERAR CONTRASEÑA CON NUMERO DE TRABAJADOR//
    $('#formNumTrabajador').submit(function(e){
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        numTrabajador   = document.getElementById("numTrabajador").value;
        console.log(numTrabajador);
        document.getElementById('reestablecer').disabled = true;
            $.ajax({
                url: "../Controlador/resetPasswordControllerNumTrabajo.php",
                type: "POST",
                datatype:"json",
                data:  {numTrabajador:numTrabajador},
                success: function(data) {
                    if(data == ""){
                        console.log(data)
                        $("#numTrabajador").val("");
                        document.getElementById('reestablecer').disabled = false;
                        Swal.fire({
                            icon: 'error',
                            title: 'Error...',
                            text: 'Este número de trabajador no esta asociado a una cuenta'
                        })
                    }else{
                        console.log(data);
                        console.log("correo ennviado");
                        $("#numTrabajador").val("");
                        document.getElementById('reestablecer').disabled = false;
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Datos enviandos al correo electrónico',
                            showConfirmButton: false,
                            timer: 1500, 
                        })
                    }
                }
            });
    });
</script>

</script>
</html>