<?php
session_start();
?>

<input type="hidden" name="codigo" value="<?= $_SESSION['codusuarioLogin']; ?>">
<h3>Perfil</h3>
<div class="mt-2">
    <input type="text" name="nombre" id="nombre_usuario" placeholder="Nombre" class="form-control" value="<?= $_SESSION['nombreLogin']; ?>" disabled>
</div>
<div class="mt-2">
    <input type="text" name="apellido" id="apellido_usuario" placeholder="Apellido" class="form-control" value="<?= $_SESSION['apellidoLogin']; ?>" disabled>
</div>
<div class="mt-2">
    <input type="email" name="correo" id="email" placeholder="Correo" class="form-control" value="<?= $_SESSION['correoLogin']; ?>" disabled>
</div>
<div class="mt-2">
    <input type="button" value="Actualizar" id="actualizar-login" class="btn btn-primary" data-toggle="modal" data-target="#modaleditarPerfil">
</div>