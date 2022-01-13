<?php session_start();
require_once("../../model/reservacionModelo.php");
include_once("../../config/Conexion.php");


$cod = isset($_POST['codigo']) ? $_POST['codigo'] : null;

$model = new reservacionModelo();

$value = $model->EditarReserva($cod);
$mostrar = $model->MostrarHabitaciones();
?>

    <input type="hidden" name="codreservacion" value="<?= $value['codreservacion']; ?>" id="codreservacion">
    <div class="form-group mt-3">
        <label for="tipo de habitaciones">Tipo de habitaciones</label>
        <select name="tipo_habitacion" id="tipo_habitacion" class="form-control">
            <?php


            while ($val = $mostrar->fetch_assoc()) :
            ?>
                <option value="<?= $val["codhabitaciones"]; ?>"><?= $val["tipo_habitacion"]; ?></option>

            <?php endwhile; ?>
        </select>
    </div>
    <div class="form-group mt-3">
        <label for="periado-estadia">Periodo de estadia</label>
        <input type="number" name="periodo_estadia" id="periodo_estadia" class="form-control" value="<?= $value['periodo_estadia']; ?>">
    </div>
    <div class="form-group mt-3">
        <label for="numero_personas">Numero de Personas</label>
        <input type="number" name="numero_personas" id="numero_personas" class="form-control" value="<?= $value['numero_personas']; ?>">
    </div>
    <div class="form-group mt-3">
        <label for="numero_habitaciones">Numero de habitaciones</label>
        <input type="number" name="numero_habitaciones" id="numero_habitaciones" class="form-control" value="<?= $value['numero_habitaciones']; ?>">
    </div>
    <div class="form-group mt-3">
        <label for="numero_hijos">Numero de Hijos</label>
        <input type="number" name="numero_hijos" id="numero_hijos" class="form-control" value="<?= $value['numero_niños']; ?>">
    </div>
    <div class="form-group mt-3">
        <label for="fechas">Fecha</label>
        <input type="date" name="fechas" id="fechas" class="form-control" value="<?= $value['fecha']; ?>">
    </div>
