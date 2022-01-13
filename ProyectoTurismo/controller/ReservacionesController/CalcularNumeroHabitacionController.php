<?php
require_once("../../model/reservacionModelo.php");
session_start();

//Numero de Habitacion
if (isset($_POST['numero_habitaciones']) && $_POST['numero_habitaciones'] != "") {
    $numero_habitaciones = intval($_POST['numero_habitaciones']);
} else {
    $numero_habitaciones = 1;
}

$_SESSION['numero_habitaciones'] = $numero_habitaciones;

$totalPeriodoEstadia = ($_SESSION['precio'] * $_SESSION['periodo_estadia']);
$totalHabitaciones = $totalPeriodoEstadia * $_SESSION['numero_habitaciones'];
$total = $_SESSION['numero_personas'] + $_SESSION['numero_hijos'] + $totalHabitaciones;
echo($total);