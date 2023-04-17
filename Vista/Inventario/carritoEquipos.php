<?php
if (!isset($_POST["codigo2"])) {
    return;
}
$codigo = $_POST["codigo2"];
include_once "bd.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM equipos_C WHERE folio_eqc = ? LIMIT 1;");
$sentencia->execute([$codigo]);
$equipos = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$equipos) {
    header("Location: ./prestamos1.php?status=4");
    exit;
}

session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carritoEquipos"]); $i++) {
    if ($_SESSION["carritoEquipos"][$i]->codigo === $codigo) {    
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $equipos->cantidad = 1;
   // $producto->total = $producto->precioVenta;
    array_push($_SESSION["carritoEquipos"], $equipos);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carritoEquipos"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $equipos->existencia) {
        header("Location: ./prestamos1.php?status=5");
        exit;
    }
    $_SESSION["carritoEquipos"][$indice]->cantidad++;
   // $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precioVenta;
}
header("Location: ./prestamos1.php");
