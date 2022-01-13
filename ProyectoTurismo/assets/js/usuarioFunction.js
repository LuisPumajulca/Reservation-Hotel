$(document).ready(function () {
  //Logueo
  $("#logueo").click(function (e) {
    e.preventDefault();
    var form = $("#form_login").serialize();
    $.ajax({
      type: "POST",
      url: "controller/usuarioController/logueoController.php",
      data: form,
      success: function (response) {
        console.log(response);
        if (response == "exito") {
          swal({
            title: "Muy bien!",
            text: "Bienvenido",
            icon: "success",
          });
          window.location.assign("http://localhost/ProyectoTurismo/inicio");
        } else {
          swal({
            title: "Ups!",
            text: "Usuario o Contraseña erronea!!",
            icon: "warning",
          });
        }
      },
    });
  });

  //Registro
  $("#registro-login").click(function (e) {
    e.preventDefault();
    var form = $("#form_registro_usuario").serialize();
    $.ajax({
      type: "POST",
      url: "controller/usuarioController/registroController.php",
      data: form,
      success: function (response) {
        if (response == "exito") {
          swal({
            title: "Muy bien!",
            text: "Registro Exitoso!!",
            icon: "success",
          });
          $("#form_registro_usuario")[0].reset();
        } else if (response == "falloCorreo") {
          swal({
            title: "Ups!",
            text: "Este Correo ya esta en uso!!",
            icon: "warning",
          });
        } else {
          swal({
            title: "Ups!",
            text: "Parece que algo salio mal vuelvelo a intentar!!",
            icon: "warning",
          });
        }
      },
    });
  });
  //Editar
  function MostrarFormularioMiPerfil() {
    $.ajax({
      type: "POST",
      url: "controller/usuarioController/FormularioMiPerfil.php",
      success: function (response) {
        $("#formPerfil").html(response);
      },
    });
  }
  MostrarFormularioMiPerfil();

  //Actualizar
  $("#actualizar-login").click(function (e) {
    e.preventDefault();
    var form = $("#formActualizarUsuario").serialize();
    $.ajax({
      type: "POST",
      url: "controller/usuarioController/actualizarController.php",
      data: form,
      success: function (response) {
        if (response == "exito") {
          swal({
            title: "Muy bien!",
            text: "Actualizacion Exitoso!!",
            icon: "success",
          });
          MostrarFormularioMiPerfil();
          $("#modaleditarReservacion").modal("hide");
          setTimeout(function () {
            location.reload();
          }, 1000);
        } else {
          swal({
            title: "Ups!",
            text: "Parece que algo salio mal vuelvelo a intentar!!",
            icon: "warning",
          });
        }
      },
    });
  });

  //Cerrar Sesion
  $("#cerrarSesion").click(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "controller/usuarioController/cerrarSesionController.php",
      success: function (response) {
        window.location = "http://localhost/ProyectoTurismo/inicio";
      },
    });
  });
});
