<?php
if (!isset($_POST["codigo"])) {
    return;
}
$codigo = $_POST["codigo"];
include_once "bd.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM articulos WHERE folio_art = ? LIMIT 1;");
$sentencia->execute([$codigo]);
$articulo = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$articulo) {
    header("Location: ./prestamos1.php?status1=7");
    exit;
}

session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carritoArticulos"]); $i++) {
    if ($_SESSION["carritoArticulos"][$i]->codigo === $codigo) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $articulo->cantidad = 1;
   // $producto->total = $producto->precioVenta;
    array_push($_SESSION["carritoArticulos"], $articulo);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carritoArticulos"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $producto->existencia) {
        header("Location: ./prestamos1.php?status1=8");
        exit;
    }
    $_SESSION["carritoArticulos"][$indice]->cantidad++;
   // $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precioVenta;
}
header("Location: ./prestamos1.php");
