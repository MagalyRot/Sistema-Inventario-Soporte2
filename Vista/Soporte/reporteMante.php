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
        <?php require("navbarSoporte.php"); ?><!-- Navbar -->
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <?php require("menuSoporte.php"); ?> <!-- Menu lateral -->
        </div>
    </header>

    <!--Contenido-->
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl" id="">
                <h1 class="app-page-title">Reporte de mantenimiento</h1>
                <hr class="mb-4">

                <div class="app-card app-card-orders-table mb-5">
                    <div class="app-card-body">
                        <div class="row g-4 settings-section">
                            <div class="col-12 col-md-12">
                                <div class="app-card app-card-settings shadow-sm p-4">
                                    <div class="app-card-body">
                                        <form class="settings-form" id="mantenimiento">
                                            <div class="row justify-content-between">
                                                <div class="col-3 mb-3">
                                                    <label for="setting-input-1" class="form-label">Fecha inicial<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                    </label>
                                                    <input type="date" class="form-control" id="fechaI" name="fechaI" required>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <label for="setting-input-1" class="form-label">Fecha final<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                    </label>
                                                    <input type="date" class="form-control" id="fechaF" name="fechaF" required>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <label for="setting-input-2" class="form-label"></label>
                                                    <div class="col-auto">
                                                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                                            <div class="col-auto">
                                                                <button id="generarDatos" type="submit" class="btn btn-warning">Generar reporte</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <hr>
                                    <div class="row justify-content-between">
                                        <div class="col-12 mb-3">
                                            <div class="table-responsive">
                                                <table class="table app-table-hover mb-0 text-left">
                                                    <thead>
                                                        <tr>
                                                            <th>Folio</th>
                                                            <th>Equipo</th>
                                                            <th>Atendio</th>
                                                            <th>Solicitante</th>
                                                            <th>Área</th>
                                                            <th>Tipo mant.</th>
                                                            <th>Fecha solicitud</th>
                                                            <th>Observaciones ingreso</th>
                                                            <th>Fecha finalizado</th>
                                                            <th>Desripción salida</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="mante">
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
        </div>
    </div>
    </div>
    <!-- Javascript -->
    <script src="../../assets/plugins/popper.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/chart.js/chart.min.js"></script>
    <script src="../../assets/js/app.js"></script>
    <script>
        //OBTIENE LOS DATOS DE LA TABLA TRASPASOS
        $('#mantenimiento').submit(function(e) {
            e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
            fechaI = document.getElementById("fechaI").value;
            fechaF = document.getElementById("fechaF").value;
            $("#mante").empty();
            console.log(fechaI);
            console.log(fechaF);
            $.ajax({
                url: "obtener_reporteMante.php",
                type: "POST",
                datatype: "json",
                data: {
                    fechaI: fechaI,fechaF: fechaF
                },
                success: function(data) {
                    if (data == "") {
                        //console.log("alerta")
                        Swal.fire({
                            icon: 'error',
                            title: 'Error...',
                            text: 'Ingrese las fechas para su búsqueda'
                        })
                    } else {
                        //console.log(data);
                        $('#mante').append(data);
                    }
                }
            });
        });
    </script>
</body>

</html>