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
                                            <button id="generarDatos" type="submit" class="btn btn-warning">Mostrar</button>
                                        </form>
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php

                    include_once "../Inventario/bd.php";
                    $folio = "URSEEQC00001";
                    $sentencia = $base_de_datos->query("SELECT e.id_eqc as id,e.folio_eqc as folio,e.ip_eqc as ip,e.descripcion_eqc as descripcion,e.estado_eqc as estado,GROUP_CONCAT( a.folio_art,'..',a.nombre_art,'..',a.descripcion_art SEPARATOR '__') as componentes FROM equipos_c as e INNER JOIN detalle_equipos as de ON e.id_eqc=de.id_eqc INNER JOIN articulos as a ON de.id_art=a.id_art and  e.estado_eqc=1 AND e.folio_eqc='$folio' GROUP BY e.id_eqc;");
                    $equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
                    foreach ($equipos as $equipo) {
                    ?>
                        <div class="col-12 col-md-6">
                            <div class="app-card app-card-settings shadow-sm p-4">
                                <div class="app-card-body">
                                    <form class="settings-form">
                                        <div class="row justify-content-between">
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-2" class="form-label">Folio del equipo</label>
                                                <input type="text" class="form-control" id="setting-input-1" value="<?php echo $equipo->folio ?>" disabled>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="setting-input-1" class="form-label">Responsable<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                </label>
                                                <input type="text" class="form-control" id="setting-input-1" disabled>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between">
                                            <div class="mb-3">
                                                <label for="setting-input-1" class="form-label">Especificaciones<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                </label>
                                                <textarea class="form-control" aria-label="With textarea" id="descripcion" name="descripcion" disabled><?php echo $equipo->descripcion ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between">
                                            <label for="setting-input-1" class="form-label">Componentes<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                            </label>
                                            <div class="app-card app-card-orders-table mb-5">
                                                <div class="app-card-body">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0 text-left table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="cell">Folio</th>
                                                                    <th class="cell">Componente</th>
                                                                    <th class="cell">Detalles</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach (explode("__", $equipo->componentes) as $componentesConcatenados) {
                                                                    $componente = explode("..", $componentesConcatenados)
                                                                ?>
                                                                    <tr>
                                                                        <td><?php echo $componente[0] ?></td>
                                                                        <td><?php echo $componente[1] ?></td>
                                                                        <td><?php echo $componente[2] ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>

            <?php
                    }
            ?>

            <hr class="mb-4">
            <div class="col-12 col-md-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form class="settings-form">
                            <div class="row justify-content-between">
                                <h5 class="section-title">Historial de Mantenimientos</h5><br>
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th>Folio</th><!--Folio del mantenimiento-->
                                                <th>Atendido</th>
                                                <th>Num de trabajador</th>
                                                <th>Nombre completo</th>
                                                <th>Área</th>
                                                <th>Tipo de mantenimiento</th>
                                                <th>Fecha de mantenimiento</th> <!--se junta la fecha de inicio y fin de manteniento-->
                                                <th>Descripción</th><!--se ingresa la descripción de salida-->
                                                <th>Nombre completo</th>
                                            </tr>
                                        </thead>
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
        "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);

    function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        document.getElementById("codigoQrObtenido").value= decodedText;
        let audioEtiqueta = document.querySelector("audio");
        audioEtiqueta.setAttribute("src", "scanner-beep.mp3");
        audioEtiqueta.play();
    }

 //submit para agregar categorías
    $('#codigoQr').submit(function(e){
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        folio   = document.getElementById("codigoQrObtenido").value;
        $("#tablaEquipos").empty();
        console.log(folio);
            $.ajax({
                url: "escaneoEquiposModel.php",
                type: "POST",
                datatype:"json",
                data:  {folio:folio},
                success: function(data) {
                    if(data == ""){
                        //console.log("alerta")
                        Swal.fire({
                            icon: 'error',
                            title: 'Error...',
                            text: 'Código incorrecto'
                        })
                    }else{
                        //console.log(data);
                        $('#tablaEquipos').append(data);
                    }
                }
            });
    });
</script>
</body>

</html>