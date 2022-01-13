<?php
require_once "controller/plantillaController.php";

require_once('config/Conexion.php');

require_once('controller/HabitacionesController/habitacionesController.php');




$plantilla = new PlantillaController();
$plantilla->ctrPlantilla();
