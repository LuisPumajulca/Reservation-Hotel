<?php
include_once("config/Conexion.php");
class habitacionesModelo
{
    public function MostrarHabitaciones()
    {
        $conn = Conexion::conectar();
        $sql = $conn->query("CALL MostrarHabitaciones();");
        return $sql;
    }
}
