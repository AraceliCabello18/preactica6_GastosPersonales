function agregarNuevoGasto(){
    $.ajax({
        type:"POST",
        data:$('#frmAgregarGasto').serialize(),
        url:"../procesos/gastos/agregarNuevoGasto.php",
        success:function(resultado) {
            resultado = resultado.trim();

            if (resultado == 1) {
                $('#frmAgregarGasto')[0].reset();
                Swal.fire(":D","Agregado con exito!","success");
                $('#tablaGastosLoad').load("gastos/tablaGastos.php");
            } else {
                Swal.fire(":(","Error al agregar" + resultado, "error");
            }
        }
    });
    
}

function actualizarGasto(){
  //  alert($('#frmActualizarGasto').serialize());
    $.ajax({
        type:"POST",
        data: $('#frmActualizarGasto').serialize(),
        url: "../procesos/gastos/actualizarGasto.php",
        success:function(resultado) {
            //alert(resultado);
            resultado = resultado.trim();
            if (resultado == 1) {
                $('#frmAgregarGasto')[0].reset();
                Swal.fire(":D","Actualizado con exito!","success");
                $('#tablaGastosLoad').load("gastos/tablaGastos.php");
            } else {
                Swal.fire(":(","Error al actualizar" + resultado, "error");
            }
        }
    });
}
function eliminar(id_categoria){
    //console.log(id_categoria);
    let idc="id_categoria="+id_categoria;
    swal.fire({
        title: "Estas seguro de eliminar?",
        text: "Una vez eliminado, no podra recuperarse el registro!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type:"POST",
                data: idc,
                url:"../procesos/gastos/eliminarGasto.php",
                success:function(resultado) {
                    resultado = resultado.trim();
                    if (resultado == 1) {
                        $('#tablaGastosLoad').load("gastos/tablaGastos.php");
                        swal.fire(":D","eliminado con exito!","success");
                    } else {
                        swal.fire(":(","No se pudo eliminar! " + resultado, "error");
                    }
                }
            });
        } 
    });
}


function obtenerDatos(idgastos) {
    //console.log(idgastos);
    $.ajax({
        type:"POST",
        data:"idgastos=" + idgastos,
        url:"../procesos/gastos/obtenerdatos.php",
        success:function(resultado) {
            //console.log(resultado);
            resultado = jQuery.parseJSON(resultado);
            $('#id_gasto').val(resultado['id_gasto']);
            $('#montoU').val(resultado['monto']);
            $('#descripcionU').val(resultado['descripcion']);
            $('#fechaU').val(resultado['fecha']);
            $('#idCategoriaU').val(resultado['id_categoria']);
        }
    });
}