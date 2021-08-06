<?php
    include "../../clases/Gastos.php";
    $Gastos = new Gastos();
    $idgastos=$_POST['idgastos'];
    echo json_encode($Gastos->obtenerDatos($idgastos));
?>