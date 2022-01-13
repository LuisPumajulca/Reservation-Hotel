<?php if (isset($_SESSION['logueo']) &&  $_SESSION['logueo'] == 'logueado') : ?>
    <div class="reserva__contenedor" style="padding-top: 100px;">
        <div class="container contenido__reserva" style="padding: 150px 150px;">
            <div class="formReserva">
                <h3>Reserva</h3>
                <form action="" id="formReservaHoteles">
                    <div class="form-group mt-3">
                        <label for="tipo de habitaciones">Tipo de habitaciones</label>
                        <select name="tipo_habitacion" id="tipo_habitacion" class="form-control">
                            <?php
                            $Controller = new habitacionesController();
                            $mostrar = $Controller->MostrarHabitaciones();
                            while ($value = $mostrar->fetch_assoc()) :
                            ?>
                                <option value="<?= $value["codhabitaciones"]; ?>"><?= $value["tipo_habitacion"]; ?></option>

                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="periado-estadia">Periodo de estadia</label>
                        <input type="number" name="periodo_estadia" id="periodo_estadia" class="form-control" value="<?= $_SESSION["periodo_estadia"]; ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="numero_personas">Numero de Personas</label>
                        <input type="number" name="numero_personas" id="numero_personas" class="form-control" value="<?= $_SESSION["cantidad_personas"]; ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="numero_habitaciones">Numero de habitaciones</label>
                        <input type="number" name="numero_habitaciones" id="numero_habitaciones" class="form-control" value="<?= $_SESSION["numero_habitaciones"]; ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="numero_hijos">Numero de Hijos</label>
                        <input type="number" name="numero_hijos" id="numero_hijos" class="form-control" value="<?= $_SESSION["cantidad_hijos"]; ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="fechas">Fecha</label>
                        <input type="date" name="fechas" id="fechas" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <input type="button" name="btn_formulario_reserva" id="btn_formulario_reserva" class="btn btn-primary" data-toggle="modal" data-target="#modalReserva" value="Reservar">

                        <div class="mt-3" id="Total_precio">



                        </div>


                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalReserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content aa">

                                <div class="payment">
                                    <div class="bg">

                                    </div>
                                    <div class="card">
                                        <img src="assets/images/chip.png" alt="" class="chip">
                                        <div class="logoCard"></div>
                                        <input class="bankName" name="nombre_banco" id="nombre_banco" contenteditable="true" placeholder="Back Name" maxlength="19">
                                        <form action="" method="post">

                                            <div class="inputBox">
                                                <span>N° Tarjeta:</span>
                                                <input type="text" name="numero_tarjeta" id="numero_tarjeta" placeholder="1111 1111 1111 1111" maxlength="12">
                                            </div>
                                            <div class="group">
                                                <div class="inputBox">
                                                    <span>Fecha Vencimiento</span>
                                                    <input type="text" name="fecha_vencimiento" id="fecha_vencimiento" placeholder="MM/YY" maxlength="5">
                                                </div>
                                                <div class="inputBox">
                                                    <span>CVV</span>
                                                    <input type="password" name="cvv" id="cvv" placeholder="***" maxlength="3">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <button class="btnModal" id="btnModal">Confirm and Pay</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="reserva__logueate">
        <div class="container" id="inicio">
            <div class="d-flex align-items-center justify-content-center flex-column vh-100">
                <h3 class="titulo__loguearte">Necesitas Loguearte para hacer alguna reserva</h3>
                <h2 class="iniciar__sesion"><a href="login" >Iniciar Sesion</a></h2>
            </div>
        </div>
    </div>
<?php endif; ?>