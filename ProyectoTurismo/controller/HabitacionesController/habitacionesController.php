<?php
include_once("model/habitacionesModelo.php");

class habitacionesController
{
    public function MostrarHabitaciones()
    {
         $modelo = new habitacionesModelo();
         $ress = $modelo->MostrarHabitaciones();
        return $ress;
    }
}
