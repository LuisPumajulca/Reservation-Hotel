<?php
require_once("../../model/reservacionModelo.php");
session_start();


//Numero de Hijos
if (isset($_POST['numero_hijos']) && $_POST['numero_hijos'] != "" && $_POST['numero_hijos'] != 0) {
    $_SESSION['cantidad_hijos'] = $_POST['numero_hijos'];
    $numero_hijos = intval($_POST['numero_hijos']) * 50;
} else {
    $numero_hijos = 0;
    $_SESSION['cantidad_hijos'] = 0;
}

$_SESSION['numero_hijos'] =  intval($numero_hijos);

$totalPeriodoEstadia = ($_SESSION['precio'] * $_SESSION['periodo_estadia']);
$totalHabitaciones = $totalPeriodoEstadia * $_SESSION['numero_habitaciones'];
$total = $_SESSION['numero_personas'] + $_SESSION['numero_hijos'] + $totalHabitaciones;
echo($total);