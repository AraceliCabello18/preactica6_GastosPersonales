<?php
session_start();
include "../../clases/Gastos.php";
$Gastos = new Gastos();
$datos = array(
    "id_gasto"=>$_POST['id_gasto'],
    "id_categoria"=>$_POST['idCategoriaU'],
    "monto"=>$_POST['montoU'],
    "descripcion"=>$_POST['descripcionU'],
    "fecha"=>$_POST['fechaU']
);

echo $Gastos->actualizarGasto($datos);
?>