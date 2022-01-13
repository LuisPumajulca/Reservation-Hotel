<?php
include_once("../../config/Conexion.php");
class GestionReservacionModelo
{
    public function MostrarReservaPorCodigo($cod,$desde, $por_pagina)
    {
        $conn = Conexion::conectar();
        $sql = $conn->query("CALL MostrarReservaPorCodigo($cod,$desde, $por_pagina)");
        return $sql;
    }

    public function CountMostrarReserva(){
        $conn = Conexion::conectar();
        $sql = $conn->query("SELECT COUNT(*) as total_registro FROM reservacion");
        $ress = $sql->fetch_assoc();
        return $ress;
    }
    public function CountMostrarReservaPorCodigo($cod){
        $conn = Conexion::conectar();
        $sql = $conn->query("SELECT COUNT(*) as total_registro FROM reservacion WHERE usuario = $cod");
      $ress = $sql->fetch_assoc();
        return $ress;
    }
    public function MostrarReserva($desde, $por_pagina)
    {
        $conn = Conexion::conectar();
        $sql = $conn->query("CALL MostrarReserva($desde, $por_pagina)");
        return $sql;
    }
}
