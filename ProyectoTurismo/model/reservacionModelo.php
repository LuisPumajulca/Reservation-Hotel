<?php
include_once("../../config/Conexion.php");
class reservacionModelo
{
    public function SacarPrecioHabitaciones($cod)
    {
        $conn = Conexion::conectar();
        $sql = $conn->query("CALL SacarPrecioHabitaciones($cod);");
        $ress = $sql->fetch_assoc();
        return $ress;
    }
    public function RegistrarReserva($data)
    {
        $conn = Conexion::conectar();
        $sql = $conn->query("CALL RegistrarReserva($data[habitaciones],$data[usuario],$data[periodo_estadia],$data[numero_personas],$data[numero_habitaciones],$data[numero_niños],'$data[fecha]','$data[nombre_banco]','$data[numero_tarjeta]','$data[fecha_vencimiento]','$data[cvv]',$data[total])");
        return $sql;
    }
    public function ActualizarReserva($data)
    {
        $conn = Conexion::conectar();
        $sql = $conn->query("CALL ActualizarReserva($data[codreservacion],$data[habitacion], $data[periodo_estadia], $data[numero_personas], $data[numero_habitaciones], $data[numero_niños],'$data[fecha]', $data[total])");

        return $sql;
    }

    public function EditarReserva($cod)
    {
        $conn = Conexion::conectar();
        $sql = $conn->query("CALL EditarReserva($cod)");
        $ress = $sql->fetch_assoc();
        return $ress;
    }
    public function EliminarReserva($cod)
    {
        $conn = Conexion::conectar();
        $sql = $conn->query("CALL EliminarReserva($cod)");
        return $sql;
    }
    function MostrarHabitaciones()
    {
        $conn = Conexion::conectar();
        $sql = $conn->query("CALL MostrarHabitaciones();");
        return $sql;
    }
}
