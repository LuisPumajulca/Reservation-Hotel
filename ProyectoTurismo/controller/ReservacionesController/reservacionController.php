<?php

require_once("../../model/reservacionModelo.php");
session_start();

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function DateGet()
{
    date_default_timezone_set('America/Lima');
    $hoy = date('Y-m-d h:i a');
    return $hoy;
}
$data['habitaciones'] =  isset($_POST['tipo_habitacion']) ? $_POST['tipo_habitacion'] : null;

$data['usuario'] = isset($_SESSION['codusuarioLogin']) ? $_SESSION['codusuarioLogin'] : null;

$data['periodo_estadia'] =  isset($_POST['periodo_estadia']) ? $_POST['periodo_estadia'] : null;

$data['numero_personas'] = isset($_POST['numero_personas']) ? $_POST['numero_personas'] : null;

$data['numero_habitaciones'] =  isset($_POST['numero_habitaciones']) ? $_POST['numero_habitaciones'] : null;

$data['numero_niños'] =  isset($_POST['numero_hijos']) ? $_POST['numero_hijos'] : null;

$data['fecha'] =  isset($_POST['fechas']) ? $_POST['fechas'] : null;

$_SESSION['fechaReservacion'] = $data['fecha'];

$data['nombre_banco'] =  isset($_POST['nombre_banco']) ? $_POST['nombre_banco'] : null;

$data['numero_tarjeta'] =  isset($_POST['numero_tarjeta']) ? $_POST['numero_tarjeta'] : null;

$data['fecha_vencimiento'] =  isset($_POST['fecha_vencimiento']) ? $_POST['fecha_vencimiento'] : null;

$data['cvv'] =  isset($_POST['cvv']) ? password_hash($_POST['cvv'], PASSWORD_BCRYPT, ['cost' => 4]) : null;

$data['total'] =  isset($_POST['total']) ? $_POST['total'] : null;


$reservaModelo = new reservacionModelo();
$respuesta = $reservaModelo->RegistrarReserva($data);


if ($respuesta) {

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {

        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0;
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com; smtp.live.com;';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'Ingrese contraseña';                     //SMTP username
        $mail->Password   = 'ingrese password';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('ReservaHotel@ReservaHotel.com', 'ReservaHotel@ReservaHotel.com');
        $mail->addAddress($_SESSION['correoLogin']);     //Add a 

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reserva Habitacion';
        $mail->Body    = '<h1> Hola, ' . ' ' . $_SESSION['nombreLogin'] . ' ' . $_SESSION['apellidoLogin'] . ' .Su reserva a sido confirmada para el dia: ' . $_POST['fechas'] . ' Monto cancelado: ' .$_POST['total'] .'</h1>';

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        if ($mail) {
            $mail->send();
            $mail->clearAddresses();
            echo 'exito';
        }
    } catch (Exception $e) {
        echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
    }
} else {
    echo ("fallo");
}
