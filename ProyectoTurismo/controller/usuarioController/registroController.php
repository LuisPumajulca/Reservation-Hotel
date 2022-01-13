<?php
require_once("../../model/usuarioModelo.php");



$data['nombre'] = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$data['apellidos'] = isset($_POST['apellido']) ? $_POST['apellido'] : null;
$data['correo'] = isset($_POST['correo']) ? $_POST['correo'] : null;
$data['contrasena'] = isset($_POST['contraseña']) ? password_hash($_POST['contraseña'], PASSWORD_BCRYPT, ['cost' => 4]) : null;

$usuarioModelo = new usuarioModelo();
$verificarCorreo = $usuarioModelo->verificarCorreo($_POST['correo']);
if ($verificarCorreo && count($verificarCorreo) > 1) {
    echo ("falloCorreo");
} else {
    $ress = $usuarioModelo->registroUsuario($data);
    if ($ress) {
       echo("exito");
      
    } else {
        echo ("fallo");
    }
}
