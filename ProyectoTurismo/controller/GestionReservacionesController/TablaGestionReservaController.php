<?php session_start();

require_once("../../model/GestionReservacionModelo.php");
class habitacionesModelo
{
    public function MostrarHabitaciones()
    {
        $conn = Conexion::conectar();
        $sql = $conn->query("SELECT * FROM habitaciones");
        return $sql;
    }
}



?>
<h1>Mis Reservas:</h1>
<hr>

<?php

if ($_SESSION['tipo_usuarioLogin'] == "cliente") {
    //Paginacion
    $GestionModelo = new GestionReservacionModelo();
    $modelo = $GestionModelo->CountMostrarReservaPorCodigo($_SESSION['codusuarioLogin']);
  
    $total_registro = $modelo['total_registro'];
    $por_pagina = 5;
    if (empty($_POST['page'])) {
        $pagina = 1;
    } else {
        $pagina = $_POST['page'];
    }
    $desde = ($pagina - 1) * $por_pagina;
    $total_paginas = ceil($total_registro / $por_pagina);

    $ress = $GestionModelo->MostrarReservaPorCodigo($_SESSION['codusuarioLogin'], $desde, $por_pagina); ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered " id="tableReserva">
            <thead class="thead-dark">
                <tr>

                    <th>Tipo habitacion</th>
                    <th>Usuario</th>
                    <th>Periodo de Estadia</th>
                    <th>N° Personas</th>
                    <th>N° Habitaciones</th>
                    <th>N° Niños</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Nombre Banco</th>
                    <th>Numero tarjeta</th>
                    <th>Fecha Vencimiento Tarjeta</th>
                    <th>CVV</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($value = $ress->fetch_assoc()) : ?>
                    <tr>

                        <td><?= $value['tipo_habitacion']; ?></td>
                        <td><?= $value['Usuario']; ?></td>
                        <td><?= $value['periodo_estadia']; ?></td>
                        <td><?= $value['numero_personas']; ?></td>
                        <td><?= $value['numero_habitaciones']; ?></td>
                        <td><?= $value['numero_niños']; ?></td>
                        <td><?= $value['fecha']; ?></td>
                        <td><?= $value['hora']; ?></td>
                        <td><?= $value['nombre_banco']; ?></td>
                        <td><?= $value['numero_tarjeta']; ?></td>
                        <td><?= $value['fecha_vencimiento_tarjeta']; ?></td>
                        <td><?= $value['cvv']; ?></td>
                        <td>S/<?= $value['total']; ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#modaleditarReservacion" id="EditarReservacion" value="<?= $value['codreservacion'] ?>"> <i class="far fa-edit" style="font-size: 30px; color: blue"> </i></a>

                            <a href="#" id="CancelarReservacion" value="<?= $value['codreservacion'] ?>"> <i class="fas fa-trash-alt" style="font-size: 30px; color: red"></i></a>

                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-9 text-center my-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center ">
                    <li class="page-item-reserva">
                        <a class="page-link-reserva" page="<?= ($pagina - 1) ?>" href="#">
                            <i class="fas fa-caret-left">
                            </i>
                        </a>
                    </li>
                    <?php

                    for ($i = 1; $i <= $total_paginas; $i++) {

                        $clase_activa = "";
                        if ($i == $pagina) {
                            $clase_activa = "press";
                        }
                    ?>
                        <li class="page-item-reserva <?= $clase_activa ?>">
                            <a class="page-link-reserva" page='<?= $i ?>' href="#"><?= $i; ?></a>
                        </li>
                    <?php }
                    if ($pagina < $total_paginas) {
                        $pagina++; ?>
                        <li class="page-item-reserva"><a class="page-link-reserva" page='<?= $pagina ?>' href="#"><i class="fas fa-caret-right"></i></a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
<?php  } else if ($_SESSION['tipo_usuarioLogin'] == "administrador") {
    $modelo = new GestionReservacionModelo();
    $ress = $modelo->MostrarReserva($desde, $por_pagina); ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered " id="tableReserva">
            <thead class="thead-dark">
                <tr>

                    <th>Tipo habitacion</th>
                    <th>Usuario</th>
                    <th>Periodo de Estadia</th>
                    <th>N° Personas</th>
                    <th>N° Habitaciones</th>
                    <th>N° Niños</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Nombre Banco</th>
                    <th>Numero tarjeta</th>
                    <th>Fecha Vencimiento Tarjeta</th>
                    <th>CVV</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($value = $ress->fetch_assoc()) : ?>
                    <tr>

                        <td><?= $value['tipo_habitacion']; ?></td>
                        <td><?= $value['Usuario']; ?></td>
                        <td><?= $value['periodo_estadia']; ?></td>
                        <td><?= $value['numero_personas']; ?></td>
                        <td><?= $value['numero_habitaciones']; ?></td>
                        <td><?= $value['numero_niños']; ?></td>
                        <td><?= $value['fecha']; ?></td>
                        <td><?= $value['hora']; ?></td>
                        <td><?= $value['nombre_banco']; ?></td>
                        <td><?= $value['numero_tarjeta']; ?></td>
                        <td><?= $value['fecha_vencimiento_tarjeta']; ?></td>
                        <td><?= $value['cvv']; ?></td>
                        <td>S/<?= $value['total']; ?></td>
                        <td>

                            <a href="#" data-toggle="modal" data-target="#modaleditarReservacion" id="EditarReservacion" value="<?= $value['codreservacion'] ?>"> <i class="far fa-edit" style="font-size: 30px; color: blue"> </i></a>

                            <a href="#" id="CancelarReservacion" value="<?= $value['codreservacion'] ?>"> <i class="fas fa-trash-alt" style="font-size: 30px; color: red"></i></a>

                        </td>
                    </tr>


                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-9 text-center my-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center ">
                    <li class="page-item-reserva">
                        <a class="page-link-reserva" page="<?= ($pagina - 1) ?>" href="#">
                            <i class="fas fa-caret-left">
                            </i>
                        </a>
                    </li>
                    <?php
                    for ($i = 1; $i <= $total_paginas; $i++) {
                        $clase_activa = "";
                        if ($i == $pagina) {
                            $clase_activa = "press";
                        }
                    ?>
                        <li class="page-item-reserva <?= $clase_activa ?>">
                            <a class="page-link-reserva" page='<?= $i ?>' href="#"><?= $i ?></a>
                        </li>
                    <?php }
                    if ($pagina < $total_paginas) {
                        $pagina++; ?>
                        <li class="page-item-reserva"><a class="page-link-reserva" page='<?= $pagina ?>' href="#"><i class="fas fa-caret-right"></i></a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        <div class="col-lg-3 text-center my-4">
            <p>
                <strong>Total Stock: </strong><?= $stock ?> UNIDADES<br>
                <strong>Total precio compra: </strong>S/.<?= $totalPrecioCompra ?> <br>
                <strong>Total precio venta: </strong>S/.<?= $totalPrecioVenta ?>
            </p>
        </div>
    </div>
<?php  } ?>