$(document).ready(function () {
  function MostrarTablaGestionReserva() {
    $.ajax({
      type: "POST",
      url: "controller/GestionReservacionesController/TablaGestionReservaController.php",
      success: function (response) {
        $("#tablaGestionarReserva").html(response);
      },
    });
  }
  MostrarTablaGestionReserva();
  function Calculo() {
    var tipo_habitacion = $("#tipo_habitacion").val();
    $.ajax({
      type: "POST",
      url: "controller/ReservacionesController/CalcularPrecioHabitacionController.php",
      data: {
        tipo_habitacion: tipo_habitacion,
      },
      success: function (response) {
        $("#Total_precio").html(
          '<label for="total">Total</label><input type="text" name="total" id="total" value="' +
            response +
            '" class="form-control" disabled>'
        );
      },
    });
    var periodo_estadia = $("#periodo_estadia").val();
    $.ajax({
      type: "POST",
      url: "controller/ReservacionesController/CalcularPeriodoEstadiaController.php",
      data: {
        periodo_estadia: periodo_estadia,
      },
      success: function (response) {
        $("#Total_precio").html(
          '<label for="total">Total</label><input type="text" name="total" id="total" value="' +
            response +
            '" class="form-control" disabled>'
        );
      },
    });

    var numero_personas = $("#numero_personas").val();
    $.ajax({
      type: "POST",
      url: "controller/ReservacionesController/CalcularNumeroPersonasController.php",
      data: {
        numero_personas: numero_personas,
      },
      success: function (response) {
        $("#Total_precio").html(
          '<label for="total">Total</label><input type="text" name="total" id="total" value="' +
            response +
            '" class="form-control" disabled>'
        );
      },
    });
    var numero_habitaciones = $("#numero_habitaciones").val();
    $.ajax({
      type: "POST",
      url: "controller/ReservacionesController/CalcularNumeroHabitacionController.php",
      data: {
        numero_habitaciones: numero_habitaciones,
      },
      success: function (response) {
        $("#Total_precio").html(
          '<label for="total">Total</label><input type="text" name="total" id="total" value="' +
            response +
            '" class="form-control" disabled>'
        );
      },
    });
    var numero_hijos = $("#numero_hijos").val();
    $.ajax({
      type: "POST",
      url: "controller/ReservacionesController/CalcularNumeroHijosController.php",
      data: {
        numero_hijos: numero_hijos,
      },
      success: function (response) {
        $("#Total_precio").html(
          '<label for="total">Total</label><input type="text" name="total" id="total" value="' +
            response +
            '" class="form-control" disabled>'
        );
      },
    });
  }

  Calculo();

  $("#tipo_habitacion").change(function (e) {
    var tipo_habitacion = $(this).val();
    $.ajax({
      type: "POST",
      url: "controller/ReservacionesController/CalcularPrecioHabitacionController.php",
      data: {
        tipo_habitacion: tipo_habitacion,
      },
      success: function (response) {
        $("#Total_precio").html(
          '<label for="total">Total</label><input type="text" name="total" id="total" value="' +
            response +
            '" class="form-control" disabled>'
        );
      },
    });
  });

  $("#periodo_estadia").keyup(function (e) {
    var periodo_estadia = $(this).val();
    $.ajax({
      type: "POST",
      url: "controller/ReservacionesController/CalcularPeriodoEstadiaController.php",
      data: {
        periodo_estadia: periodo_estadia,
      },
      success: function (response) {
        $("#Total_precio").html(
          '<label for="total">Total</label><input type="text" name="total" id="total" value="' +
            response +
            '" class="form-control" disabled>'
        );
      },
    });
  });

  $("#numero_personas").keyup(function (e) {
    var numero_personas = $(this).val();
    $.ajax({
      type: "POST",
      url: "controller/ReservacionesController/CalcularNumeroPersonasController.php",
      data: {
        numero_personas: numero_personas,
      },
      success: function (response) {
        $("#Total_precio").html(
          '<label for="total">Total</label><input type="text" name="total" id="total" value="' +
            response +
            '" class="form-control" disabled>'
        );
      },
    });
  });

  $("#numero_habitaciones").keyup(function (e) {
    var numero_habitaciones = $(this).val();
    $.ajax({
      type: "POST",
      url: "controller/ReservacionesController/CalcularNumeroHabitacionController.php",
      data: {
        numero_habitaciones: numero_habitaciones,
      },
      success: function (response) {
        $("#Total_precio").html(
          '<label for="total">Total</label><input type="text" name="total" id="total" value="' +
            response +
            '" class="form-control" disabled>'
        );
      },
    });
  });

  $("#numero_hijos").keyup(function (e) {
    var numero_hijos = $(this).val();
    $.ajax({
      type: "POST",
      url: "controller/ReservacionesController/CalcularNumeroHijosController.php",
      data: {
        numero_hijos: numero_hijos,
      },
      success: function (response) {
        $("#Total_precio").html(
          '<label for="total">Total</label><input type="text" name="total" id="total" value="' +
            response +
            '" class="form-control" disabled>'
        );
      },
    });
  });

  $(document).on("click", "#btnModal", function (e) {
    e.preventDefault();

    var tipo_habitacion = document.getElementById("tipo_habitacion").value;
    var periodo_estadia = document.getElementById("periodo_estadia").value;
    var numero_personas = document.getElementById("numero_personas").value;
    var numero_habitaciones = document.getElementById(
      "numero_habitaciones"
    ).value;
    var numero_hijos = document.getElementById("numero_hijos").value;
    var fechas = document.getElementById("fechas").value;
    var total = document.getElementById("total").value;
    var nombre_banco = document.getElementById("nombre_banco").value;
    var numero_tarjeta = document.getElementById("numero_tarjeta").value;
    var fecha_vencimiento = document.getElementById("fecha_vencimiento").value;
    var cvv = document.getElementById("cvv").value;

    //Comparar Fechas
    var f = new Date();
    var mes = (f.getMonth() + 1).toString();
    if (mes.length <= 1) {
      mes = "0" + mes;
    }
    var dia = f.getDate().toString();
    if (dia.length <= 1) {
      dia = "0" + dia;
    }
    fecha_actual = f.getFullYear() + "-" + mes + "-" + dia;

    //validaciones
    if (fecha_vencimiento.length < 5) {
      swal({
        title: "Ups!",
        text: "Fecha de vencimiento no valida",
        icon: "warning",
      });
    } else if (fechas < fecha_actual) {
      swal({
        title: "Ups!",
        text: "No puedes poner una fecha menor a " + fecha_actual,
        icon: "warning",
      });
    } else if (fechas == "") {
      swal({
        title: "Ups!",
        text: "Falta ingresar la fecha de tu reservacion",
        icon: "warning",
      });
    } else if (nombre_banco == "") {
      swal({
        title: "Ups!",
        text: "Falta ingresar el nombre del banco",
        icon: "warning",
      });
    } else if (
      nombre_banco != "scotiabank" &&
      nombre_banco != "bbva" &&
      nombre_banco != "interbank" &&
      nombre_banco != "bcp"
    ) {
      swal({
        title: "Ups!",
        text: "Ese banco no existe!!",
        icon: "warning",
      });
    } else if (numero_tarjeta == "") {
      swal({
        title: "Ups!",
        text: "Falta ingresar el numero de tarjeta",
        icon: "warning",
      });
    } else if (numero_tarjeta.length < 12) {
      swal({
        title: "Ups!",
        text: "Debes ingresar un numero de 12 digitos",
        icon: "warning",
      });
    } else if (fecha_vencimiento == "" && fecha_vencimiento.length < 5) {
      swal({
        title: "Ups!",
        text: "Falta ingresar la fecha de vencimiento",
        icon: "warning",
      });
    } else if (cvv == "") {
      swal({
        title: "Ups!",
        text: "Falta ingresar el CVV",
        icon: "warning",
      });
    } else {
      const data = new FormData();

      data.append("tipo_habitacion", tipo_habitacion);
      data.append("periodo_estadia", periodo_estadia);
      data.append("numero_personas", numero_personas);
      data.append("numero_habitaciones", numero_habitaciones);
      data.append("numero_hijos", numero_hijos);
      data.append("fechas", fechas);
      data.append("total", total);
      data.append("nombre_banco", nombre_banco);
      data.append("numero_tarjeta", numero_tarjeta);
      data.append("fecha_vencimiento", fecha_vencimiento);
      data.append("cvv", cvv);
      $.ajax({
        type: "POST",
        url: "controller/ReservacionesController/reservacionController.php",
        data: data,
        contentType: !1,
        processData: !1,
        success: function (response) {
          console.log(response);
          if (response == "exito") {
            swal({
              title: "Muy bien!",
              text: "Reservado con exito, verifique su correo!!",
              icon: "success",
            });
            $("#modalReserva").modal("hide");
          } else {
            swal({
              title: "Ups!!!",
              text: "Parece que algo salio mal vuelve a intentarlo!!",
              icon: "warning",
            });
          }
        },
      });
    }
  });
  $(document).on("click", "#EditarReservacion", function (e) {
    e.preventDefault();
    var codigo = $(this).attr("value");

    $.ajax({
      type: "POST",
      url: "controller/GestionReservacionesController/EditarReservacionController.php",
      data: {
        codigo: codigo,
      },
      success: function (response) {
        $("#formActualizarReserva").html(response);
      },
    });
  });
  $(document).on("click", "#ActualizarReservacionGestion", function (e) {
    var form = $("#formActualizarReserva").serialize();
    console.log(form);
    $.ajax({
      type: "POST",
      url: "controller/GestionReservacionesController/ActualizarReservacionController.php",
      data: form,
      success: function (response) {
        console.log(response);
        MostrarTablaGestionReserva();
        $("#modaleditarReservacion").modal("hide");
      },
    });
  });

  $(document).on("click", "#CancelarReservacion", function (e) {
    e.preventDefault();
    var codigo = $(this).attr("value");
    swal({
      title: "Quieres Cancelar tu reserva?",
      text: "Se eliminara tu reserva estas seguro?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type: "POST",
          url: "controller/GestionReservacionesController/EliminarReservacionController.php",
          data: {
            "codigo" : codigo,
          },
          success: function (response) {
            if (response == "exito") {
              swal("Tu Archivo ha sido elminado!!", {
                icon: "success",
              });
              MostrarTablaGestionReserva();
            }
          },
        });
      } else {
        swal("¡Tu archivo imaginario está a salvo!");
      }
    });
  });


  //Paginacion
  $(document).on("click", ".page-link-reserva", function () {
    var page = $(this).attr("page");
    $.ajax({
      type: "POST",
      url: "controller/GestionReservacionesController/TablaGestionReservaController.php",
      data: {
        page: page,
      },
      beforeSend: function () {
        $("#tablaGestionarReserva").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#tablaGestionarReserva").html(response);
      },
    });
  });
});
