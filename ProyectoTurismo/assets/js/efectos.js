$(document).ready(function () {
  function Mostrar(clase) {
    $(clase).removeClass("ocultar");
    $(clase).addClass("mostrar");
  }
  function Ocultar(clase) {
    $(clase).removeClass("mostrar");
    $(clase).addClass("ocultar");
  }

  $(document).ready(function () {
    $(document).on("click", ".signupBtn", function () {
      $(".formBx").addClass("active");
      $("body").addClass("active");
    });
    $(document).on("click", ".signinBtn", function () {
      $(".formBx").removeClass("active");
      $("body").removeClass("active");
    });
  });

  $(document).on("click", "#login", function () {
    Ocultar(".form_registro_usuario");
    Mostrar(".form_login ");
  });
  $(document).on("click", "#btn-registroUsu", function () {
    Ocultar(".form_login ");
    Mostrar(".form_registro_usuario");
  });

  $(function () {
    $(".toggle").on("click", function () {
      if ($(".item").hasClass("active")) {
        $(".item").removeClass("active");
        $(".descrip__menu").removeClass("discrip__menu_mostrar");
        $(this).find("a").html("<i class='fas fa-bars'></i>");
      } else {
        $(".item").addClass("active");

        $(this).find("a").html("<i class='fas fa-times'></i>");
      }
    });
  });

  $("#btn_perfil").click(function (e) {
    e.preventDefault();
    $(".descrip__menu").toggleClass("discrip__menu_mostrar");
  });

  const meiunBP = matchMedia("(max-width: 599px)");
  var menu = document.getElementById("#descrip__menu");
  const changeSize = (mql) => {
    if (mql.matches) {
      $(".descrip__menu").removeClass("discrip__menu_mostrar");
    }
  };
  meiunBP.addListener(changeSize);
  changeSize(meiunBP);

  //Vistas
  $("#reserva").click(function (e) {
    e.preventDefault();
   
    $("#VistaReserva").removeClass("EsconderVista");
    $("#Vistaservicios").addClass("EsconderVista");
    $("#VistaInicio").addClass("EsconderVista");
    $("#VistaPerfil").addClass("EsconderVista");
    $("#VistaGestionReserva").addClass("EsconderVista");
  });
  $("#perfil").click(function (e) {
    e.preventDefault();
   
    $("#VistaReserva").addClass("EsconderVista");
    $("#Vistaservicios").addClass("EsconderVista");
    $("#VistaInicio").addClass("EsconderVista");
    $("#VistaPerfil").removeClass("EsconderVista");
    $("#VistaGestionReserva").addClass("EsconderVista");
  });
  $("#inicio").click(function (e) {
    e.preventDefault();
   
    $("#VistaReserva").addClass("EsconderVista");
    $("#Vistaservicios").addClass("EsconderVista");
    $("#VistaInicio").removeClass("EsconderVista");
    $("#VistaPerfil").addClass("EsconderVista");
    $("#VistaGestionReserva").addClass("EsconderVista");
  });
  $("#logo").click(function (e) {
    e.preventDefault();
   
    $("#VistaReserva").addClass("EsconderVista");
    $("#Vistaservicios").addClass("EsconderVista");
    $("#VistaInicio").removeClass("EsconderVista");
    $("#VistaPerfil").addClass("EsconderVista");
    $("#VistaGestionReserva").addClass("EsconderVista");
  });
  $("#GestionReserva").click(function (e) {
    e.preventDefault();
    
    $("#VistaReserva").addClass("EsconderVista");
    $("#Vistaservicios").addClass("EsconderVista");
    $("#VistaInicio").addClass("EsconderVista");
    $("#VistaPerfil").addClass("EsconderVista");
    $("#VistaGestionReserva").removeClass("EsconderVista");
  });
  $("#servicios").click(function (e) {
    e.preventDefault();
   
    $("#VistaReserva").addClass("EsconderVista");
    $("#Vistaservicios").removeClass("EsconderVista");
    $("#VistaPerfil").addClass("EsconderVista");
    $("#VistaInicio").addClass("EsconderVista");
    $("#VistaGestionReserva").addClass("EsconderVista");
  });

});
