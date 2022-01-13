<?php
require_once("../../model/reservacionModelo.php");
session_start();

//periodo de estadia
if (isset($_POST['periodo_estadia']) && $_POST['periodo_estadia'] != "") {
    $periodo_estadia = intval($_POST['periodo_estadia']);
} else {
    $periodo_estadia = 1;
}

$_SESSION['periodo_estadia'] = $periodo_estadia;

$totalPeriodoEstadia = ($_SESSION['precio'] * $_SESSION['periodo_estadia']);
$totalHabitaciones = $totalPeriodoEstadia * $_SESSION['numero_habitaciones'];
$total = $_SESSION['numero_personas'] + $_SESSION['numero_hijos'] + $totalHabitaciones;
echo($total);