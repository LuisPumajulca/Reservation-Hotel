<?php

require_once("../../model/usuarioModelo.php");
session_start();
$correo = isset($_POST['correo']) ? $_POST['correo'] : null;
$pass = isset($_POST['contraseña']) ? $_POST['contraseña'] : null;


$usuarioModelo = new usuarioModelo();
$ress = $usuarioModelo->Login($correo, $pass);

if ($ress) {
    echo ("exito");
    $_SESSION['logueo'] = 'logueado';
    $_SESSION['codusuarioLogin'] = $ress['codusuario'];
    $_SESSION['nombreLogin'] = $ress['nombre'];
    $_SESSION['apellidoLogin'] = $ress['apellidos'];
    $_SESSION['correoLogin'] = $ress['correo'];
    $_SESSION['estadoLogin'] = $ress['estado'];
    $_SESSION['tipo_usuarioLogin'] = $ress['tipo_usuario'];
} else {
    echo ("fallo");
}
