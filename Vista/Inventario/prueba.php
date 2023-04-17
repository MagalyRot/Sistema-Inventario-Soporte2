<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Datatables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css">
        <!-- Extension responsiva-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.css">

    <title>Document</title>
</head>
<body>
<div class="table-responsive">
                    <table id="datos_articulos" class="table-sm table-bordered display nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th >Folio</th>
                                <th >Folio</th>
                                <th >Artículo</th>
                                <th >Modelo</th>
                                <th >Descripción</th>
                                <th >Categoría</th>
                                <th >Fecha póliza</th>
                                <th >Estado</th>
                                <th >Estado</th>
                                <!-- <th >Código QR</th>-->
                            </tr>
                        </thead>
                    </table>
                </div>
<!-- SCRIPT PARA OBTENER LOS ARTICULOS -->

<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="tabla_articulos.js"></script> 
</body>
</html>