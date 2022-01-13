<?php
require_once("../../model/usuarioModelo.php");
session_start();


$data['nombre'] = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$data['apellido'] = isset($_POST['apellido']) ? $_POST['apellido'] : null;
$data['correo'] = isset($_POST['correo']) ? $_POST['correo'] : null;
$data['codigo'] = isset($_POST['codigo']) ? $_POST['codigo'] : null;

$modelo = new usuarioModelo();
$actualizar = $modelo->Actualizarusuario($data);



if ($actualizar) {
    echo ("exito");
    $_SESSION['nombreLogin'] = $_POST['nombre'];
    $_SESSION['apellidoLogin'] = $_POST['apellido'];
    $_SESSION['correoLogin'] = $_POST['correo'];
} else {
    echo ("fallo");
}
