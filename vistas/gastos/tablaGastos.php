<?php
    session_start();
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idUsuario = $_SESSION['usuario']['id'];
    $sql = "SELECT 
                gastos.id_gasto AS idGasto,
                cat.nombre AS categoria,
                gastos.monto AS monto,
                gastos.descripcion AS descripcion,
                gastos.fecha AS fecha
            FROM
                t_gastos AS gastos
                    INNER JOIN
                t_cat_categorias AS cat ON gastos.id_categoria = cat.id_categoria
                    AND gastos.id_usuario = '$idUsuario'";
    $respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-bordered" style="background-color:white" id="datatableGastos">
    <thead>
        <tr>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($mostrar = mysqli_fetch_array($respuesta)) { 
        ?>
        <tr>
            <td><?php echo $mostrar['categoria'];?></td>
            <td><?php echo $mostrar['monto'];?></td>
            <td><?php echo $mostrar['descripcion'];?></td>
            <td><?php echo $mostrar['fecha'];?></td>
            <td>
                <button class="btn btn-warning" data-toggle="modal" data-target="#modalActualizarGasto" onclick="obtenerDatos(<?php echo $mostrar['idGasto'] ?>)">Editar
                    <span class="fas fa-edit"></span>
                </button>
            </td>
            <td>
                <button class="btn btn-danger" onclick="eliminar(<?php echo $mostrar['idGasto'] ?>)">Eliminar
                <span class="fas fa-dumpster-fire"></span>
                </button>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function(){
        $('#datatableGastos').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
                
            ]
        });
    });
</script>