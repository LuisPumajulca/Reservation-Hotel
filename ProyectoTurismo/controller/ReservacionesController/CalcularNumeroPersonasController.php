<?php
require_once("../../model/reservacionModelo.php");
session_start();

//Numero de personas
if (isset($_POST['numero_personas']) && $_POST['numero_personas'] != "") {
    $_SESSION['cantidad_personas'] = $_POST['numero_personas'];
    $numero_personas =  intval($_POST['numero_personas']) * 100;
} else {
    $numero_personas =  1;
    $_SESSION['cantidad_personas'] = 1;
}

$_SESSION['numero_personas'] = $numero_personas;

$totalPeriodoEstadia = ($_SESSION['precio'] * $_SESSION['periodo_estadia']);
$totalHabitaciones = $totalPeriodoEstadia * $_SESSION['numero_habitaciones'];
$total = $_SESSION['numero_personas'] + $_SESSION['numero_hijos'] + $totalHabitaciones;
echo($total);