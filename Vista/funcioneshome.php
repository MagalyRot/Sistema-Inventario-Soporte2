<?php
function conteomantenimientos (){
    $conect = mysqli_connect("localhost","root","","sistema_urse");
    $conect->set_charset("utf8");
    $qry="SELECT COUNT(*) AS total FROM vista_mantenimientosfinalizados";
    if ($resultado = mysqli_query($conect, $qry)) {
    /* obtener array asociativo */
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo '<h4 class="mb-0">'.$row["total"]. '</h4>';
        //echo '<option value="'.$row["id_prov"].'">'.$row["empresa_prov"].'</option>';
    }
    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
    }
}
?>