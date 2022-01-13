<?php
session_start();

//Incluyendo todos los controladores existentes


include 'views/Layout/header.php';

/*=============================================
      CONTENIDO
      =============================================*/
if (isset($_GET["ruta"])) {

    if ($_GET['ruta'] == "login" ) {
        include_once "views/" . $_GET['ruta'] . ".php";
    }else if (
        $_GET['ruta'] == "inicio" ||
        $_GET['ruta'] == "reserva" ||
        $_GET['ruta'] == "perfil" ||
        $_GET['ruta'] == "GestionReserva" ||
        $_GET['ruta'] == "servicios"
    ) {
        include "views/Layout/menu.php";
        include_once "views/" . $_GET['ruta'] . ".php";
        include "views/Layout/footerVista.php";
    } else {

        include "views/Layout/404.php";
    }
} else {
    include "views/Layout/menu.php";
    include "views/inicio.php";
    include "views/Layout/footerVista.php";
}

include 'views/Layout/footer.php';
