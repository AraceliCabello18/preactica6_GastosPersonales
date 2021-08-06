<?php
    include "Conexion.php";

    class Gastos extends Conexion {
        public function agregarNuevoGasto($idUsuario, $idCategoria, $monto, $descripcion, $fecha) {
            $conexion = Conexion::conectar();

            $sql = "INSERT INTO t_gastos (id_categoria,
                                            id_usuario,
                                            monto,
                                            descripcion,
                                            fecha) 
                    VALUES ('$idCategoria',
                            '$idUsuario',
                            '$monto',
                            '$descripcion',
                            '$fecha')";
            $respuesta = mysqli_query($conexion, $sql);
            mysqli_close($conexion);

            return $respuesta;
        }
        
        public function actualizarGasto($datos){
            $conexion= Conexion::conectar();
            $sql="UPDATE t_gastos SET id_categoria=?, monto=?, descripcion=?, fecha=? WHERE id_gasto=?";
            $query=$conexion->prepare($sql);
            $query->bind_param(
            'iissi', $datos['id_categoria'],
                    $datos['monto'],
                    $datos['descripcion'],
                    $datos['fecha'],
                    $datos['id_gasto']
            );
            $respuesta=$query->execute();
            return $respuesta;
        }
        public function eliminarGastos($id_gasto){
            $conexion= Conexion::conectar();
            $sql="DELETE FROM t_gastos WHERE id_gasto='$id_gasto'";
            $respuesta=mysqli_query($conexion,$sql);
            return $respuesta;
        }
        public function obtenerDatos($id_gasto){
            $conexion= Conexion::conectar();
            $sql = "SELECT id_gasto,
                            monto,
                            descripcion,
                            fecha,
                            id_categoria 
                        FROM t_gastos
                        WHERE id_gasto = '$id_gasto'";
        $respuesta = mysqli_query($conexion, $sql);
        $gastos = mysqli_fetch_array($respuesta);
        $datos = array(
                "id_gasto" => $gastos['id_gasto'],
                "id_categoria" => $gastos['id_categoria'],
                "monto" => $gastos['monto'],
                "descripcion" => $gastos['descripcion'],
                "fecha" => $gastos['fecha'] 
        );
        return $datos;
        }
    }