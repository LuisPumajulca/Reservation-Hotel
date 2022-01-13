<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-image: url('assets/images/hotel1.jpg');
        transition: 0.5s;
    }

    body.active {
        background-image: url('assets/images/hotel2.jpg');
    }

    .icon_retroceder {
        position: absolute;
        top: 10px;
        left: 20px;
        font-size: 40px;
        color: black;
        z-index: 10000;
    }

    .icon_retroceder a {
        text-decoration: none;
        outline: none;
        color: #000;
        transition: all 0.5s ease-in-out;
    }
    .icon_retroceder a:hover {
        font-size: 50px;
    }
</style>

<div class="container_login">
    <div class="Bluebg">
        <div class="box signin">
            <h2>¿Ya tienes una cuenta? </h2>
            <button class="signinBtn"> iniciar sesión</button>
        </div>
        <div class="box signup">
            <h2>¿No tienes una cuenta? </h2>
            <button class="signupBtn"> Registrarse</button>
        </div>
    </div>
    <div class="formBx">
        <div class="icon_retroceder">
            <a href="inicio"><i class="fas fa-angle-left"></i></a>
        </div>
        <div class="form signinForm">
            <form action="" id="form_login">
                <h3>iniciar sesión</h3>
                <input type="text" name="correo" placeholder="Username">
                <input type="password" name="contraseña" placeholder="Password">
                <input type="submit" id="logueo" value="Entrar">
            </form>
        </div>
        <div class="form signupForm">
            <form action="" id="form_registro_usuario">
                <h3>Registrarse</h3>
                <input type="text" name="nombre" id="nombre_usuario" placeholder="Nombre">
                <input type="text" name="apellido" id="apellido_usuario" placeholder="Apellido">
                <input type="email" name="correo" id="email" placeholder="Correo">
                <input type="password" name="contraseña" id="password" placeholder="Contraseña">
                <input type="submit" value="Registro" id="registro-login">
            </form>
        </div>
    </div>
</div>
