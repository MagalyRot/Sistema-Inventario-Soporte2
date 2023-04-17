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
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css">
    <!-- Extension responsiva-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.css">
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
                <h1 class="app-page-title">Equipo de cómputo</h1>
                <hr class="mb-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-6">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <div class="row justify-content-between">
                                    <div class="mb-3">
                                        <div class="w-100" id="reader"></div>
                                        <audio src=""></audio>
                                    </div>
                                    <div class=" mb-3">
                                        <form id="codigoQr">
                                            <input type="hidden" name="codigoQrObtenido" id="codigoQrObtenido">
                                            <button id="generarDatos" type="submit" class="btn btn-warning">Muestra</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6" id="Equipo">
                    </div>
                </div>



                <hr class="mb-4">
                <div class="col-12 col-md-12">
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">
                            <form class="settings-form">
                                <div class="row justify-content-between">
                                    <h5 class="section-title">Historial de traspasos</h5><br>
                                    <div class="table-responsive">
                                        <table id="tabla_traspasos" class="table app-table-hover mb-0 text-left">
                                            <thead>
                                                <tr>
                                                    <th>Folio</th>
                                                    <th>Fecha asignación</th>
                                                    <th>Fecha término</th>
                                                    <th>Asignado</th>
                                                    <th>Área asignado</th>
                                                    <th>Ubicación</th>
                                                    <th>Tipo asignación</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody id="Asignacion">       
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
    <!--LIBRERIA QR-->
    <script src="../../JS/html5-qrcode.min.js"></script>
    <?php
    $var = 1;
    ?>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Handle on success condition with the decoded text or result.
            console.log(`Scan result: ${decodedText}`, decodedResult);
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);

        function onScanSuccess(decodedText, decodedResult) {
            // Handle on success condition with the decoded text or result.
            document.getElementById("codigoQrObtenido").value = decodedText;
            let audioEtiqueta = document.querySelector("audio");
            audioEtiqueta.setAttribute("src", "scanner-beep.mp3");
            audioEtiqueta.play();
        }

        //OBTENER LOS COMPONENTES DE UN EQUIPO D E CÓMPUTO
        $('#codigoQr').submit(function(e) {
            e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
            folio = document.getElementById("codigoQrObtenido").value;
            $("#Equipo").empty();
            console.log(folio);
            $.ajax({
                url: "escaneoEquiposModel.php",
                type: "POST",
                datatype: "json",
                data: {
                    folio: folio
                },
                success: function(data) {
                    if (data == "") {
                        //console.log("alerta")
                        Swal.fire({
                            icon: 'error',
                            title: 'Error...',
                            text: 'Código incorrecto'
                        })
                    } else {
                        //console.log(data);
                        $('#Equipo').append(data);
                    }
                }
            });
        });

        //OBTIENE LOS DATOS DE LA TABLA TRASPASOS
        $('#codigoQr').submit(function(e) {
            e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
            folio = document.getElementById("codigoQrObtenido").value;
            $("#Equipo").empty();
            console.log(folio);
            $.ajax({
                url: "historialTraspasos.php",
                type: "POST",
                datatype: "json",
                data: {
                    folio: folio
                },
                success: function(data) {
                    if (data == "") {
                        //console.log("alerta")
                        Swal.fire({
                            icon: 'error',
                            title: 'Error...',
                            text: 'Código incorrecto'
                        })
                    } else {
                        //console.log(data);
                        $('#Asignacion').append(data);
                    }
                }
            });
        });
    </script>
    <script src="historialesController.js"></script>
</body>

</html>