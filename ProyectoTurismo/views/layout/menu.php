<?php
if (isset($_SESSION['logueo']) && $_SESSION['logueo'] == 'logueado') : ?>
    <nav class="nav-menu">
        <ul class="menu">
            <li class="logo" id="logo"><a href=""><img style="border-radius: 30px;" width="3%" height="3%" src="assets/images/LogoPuma.jpg" alt="logo"></a></li>
            <li class="item" id="inicio"><a href="">Inicio</a></li>
            <li class="item " id="servicios"><a href="">Servicios</a></li>
          
            <li class="item" id="reserva"><a href="">Reservar</a>
            </li>
            <li class="item button">
                <a href="perfil" id="btn_perfil">
                    <i class="far fa-address-card"></i>
                </a>
            </li>
            <?php if ($_SESSION['tipo_usuarioLogin'] == 'cliente') : ?>
                <div class="descrip__menu" id="descrip__menu">
                    <span>Hola Cliente <?= $_SESSION['nombreLogin'] . ' ' . $_SESSION['apellidoLogin'] ?></span>
                    <div class="enlaces__menu mt-2">
                        <a href="perfil" id="perfil"><i class="fas fa-user"></i>Perfil</a><br>
                        <a href="GestionReserva" id="GestionReserva"><i class="fas fa-door-closed"></i>Mis Reservas</a><br>
                        <a href="#" id="cerrarSesion"><i class="fas fa-times"></i>Cerrar Sesion</a>
                    </div>
                </div>
            <?php else : ?>
                <div class="descrip__menu" id="descrip__menu">
                    <span>Hola Administrador <?= $_SESSION['nombreLogin'] . ' ' . $_SESSION['apellidoLogin'] ?></span>
                    <div class="enlaces__menu mt-2">
                        <a href="perfil"><i class="fas fa-user"></i>Perfil</a><br>
                        <a href="GestionReserva"><i class="fas fa-door-closed"></i>Gestionar Reservas</a><br>
                        <a id="cerrarSesion"><i class="fas fa-door-closed"></i>Cerrar Sesion</a>
                    </div>
                </div>
            <?php endif; ?>

            <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
        </ul>
    </nav>
<?php else : ?>
    <nav class="nav-menu">
        <ul class="menu">

            <li class="logo" id="logo"><a href=""  ><img style="border-radius: 30px;" width="3%" height="3%" src="assets/images/LogoPuma.jpg" alt="logo"></a></li>
            <li class="item" id="inicio"><a href="">Inicio</a></li>
            <li class="item" id="servicios"><a href="">Servicios</a></li>

            <li class="item" id="reserva"><a href="">Reservar</a>
            </li>
            <li class="item button">
                <a href="perfil" id="btn_perfil">
                    <i class="far fa-address-card"></i>
                </a>
            </li>
            <div class="descrip__menu" id="descrip__menu">
                <span></span>
                <div class="enlaces__menu mt-2">
                    <a href="login"><i class="fas fa-user"></i>Iniciar Sesion</a><br>
                </div>
            </div>
            <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
        </ul>
    </nav>
<?php endif; ?>