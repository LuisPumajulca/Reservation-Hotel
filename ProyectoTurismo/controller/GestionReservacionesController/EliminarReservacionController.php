<?php 
require_once("../../model/reservacionModelo.php");

$cod = isset($_POST['codigo']) ? $_POST['codigo'] : null;
$model = new reservacionModelo();

$ress = $model->EliminarReserva($cod);

if ($ress) {
   echo("exito");
}else{
    echo("fallo");
}