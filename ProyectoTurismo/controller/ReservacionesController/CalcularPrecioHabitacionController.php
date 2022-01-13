<?php
require_once("../../model/reservacionModelo.php");
session_start();

//Precio de habitacion
$tipo_habitacion = isset($_POST['tipo_habitacion']) ? $_POST['tipo_habitacion'] : 1;
$modelo = new reservacionModelo();
$ress = $modelo->SacarPrecioHabitaciones($tipo_habitacion);

$precioHabitacion = $ress['precio'];
$_SESSION['precio'] =  isset($precioHabitacion) ? intval($precioHabitacion) : 0;

$totalPeriodoEstadia = ($_SESSION['precio'] * $_SESSION['periodo_estadia']);
$totalHabitaciones = $totalPeriodoEstadia * $_SESSION['numero_habitaciones'];
$total = $_SESSION['numero_personas'] + $_SESSION['numero_hijos'] + $totalHabitaciones;

echo($total);
