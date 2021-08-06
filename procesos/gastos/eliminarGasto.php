<?php
include "../../clases/Gastos.php";
$Gastos = new Gastos();
$id_categoria=$_POST['id_categoria'];
echo $Gastos->eliminarGastos($id_categoria);
?>