<?php session_start();
require_once("../../model/reservacionModelo.php");

$data['habitacion'] = isset($_POST['tipo_habitacion']) ? $_POST['tipo_habitacion'] : null;
$data['periodo_estadia'] = isset($_POST['periodo_estadia']) ? $_POST['periodo_estadia'] : 1;
$data['numero_personas'] = isset($_POST['numero_personas']) ?  $_POST['numero_personas'] : 1;
$data['numero_habitaciones'] = isset($_POST['numero_habitaciones']) ? $_POST['numero_habitaciones'] : 1;
$data['numero_niños'] = isset($_POST['numero_hijos']) ? $_POST['numero_hijos'] : 0;
$data['fecha'] = isset($_POST['fechas']) ? $_POST['fechas'] : null;
$data['codreservacion'] = isset($_POST['codreservacion']) ? $_POST['codreservacion'] : null;

$model = new reservacionModelo();

$ress = $model->SacarPrecioHabitaciones($data['habitacion']);
$precioHabitacion = $ress['precio'];
$precioPorPersona =  intval($_POST['numero_personas']) * 100;
$precioPorNiño = intval($_POST['numero_hijos']) * 50;

$totalPeriodoEstadia = ($precioHabitacion * $data['periodo_estadia']);
$totalHabitaciones = $totalPeriodoEstadia * $data['numero_habitaciones'];
$data['total'] = $precioPorPersona + $precioPorNiño + $totalHabitaciones;

$ress = $model->ActualizarReserva($data);

if ($ress) {
    echo ("exito");
} else {
    echo ("fallo");
}
