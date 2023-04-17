<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="">

    <link id="theme-style" rel="stylesheet" href="../assets/css/sistemaIS.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	
    <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>
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
			    <h1 class="app-page-title">Home</h1>
			     <!-- Aqui va todo el contenido -->
				
			</div>
	    </div>
    </div>				

    <!-- Javascript -->
 
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/chart.js/chart.min.js"></script>
    <script src="../assets/js/app.js"></script>		
</body>

</html>