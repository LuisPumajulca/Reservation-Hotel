<div class="perfil__contenedor">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center flex-wrap vh-100">
            <div class="d-flex justify-content-center align-items-center flex-column" style="border: 1px solid black; padding: 20px; border-radius: 15px;">
                <form action="" id="formPerfil">

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modaleditarPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal__editarPerfil" id="modal__editarPerfil">
                    <form id="formActualizarUsuario">
                        <input type="hidden" name="codigo" value="<?= $_SESSION['codusuarioLogin']; ?>">
                        <h3>Perfil</h3>
                        <div class="mt-2">
                            <input type="text" name="nombre" id="nombre_usuario" placeholder="Nombre" class="form-control" value="<?= $_SESSION['nombreLogin']; ?>">
                        </div>
                        <div class="mt-2">
                            <input type="text" name="apellido" id="apellido_usuario" placeholder="Apellido" class="form-control" value="<?= $_SESSION['apellidoLogin']; ?>">
                        </div>
                        <div class="mt-2">
                            <input type="email" name="correo" id="email" placeholder="Correo" class="form-control" value="<?= $_SESSION['correoLogin']; ?>">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="actualizar-login">Actualizar</button>
            </div>
        </div>
    </div>
</div>