<?php

// Definición de la clase HabitacionView
class HabitacionesView {

    /**
     * Funcion que muestra el listado de habitaciones
     * @param type $habitaciones
     */
    function mostrarHabitaciones($habitaciones) {
        $fecha = date("Y-m-d");
        $id_hotel = $_GET["id"];
        ?>
        <div class="container mt-5 bg-white rounded shadow-lg p-4">
            <div class="jumbotron">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="display-4">Hola <?php echo $_SESSION["usuario"] ?></h1>
                    <?php
                    if ($_SESSION["rol"] == 1) {
                        ?>
                        <a href="./index.php?controller=&action=" class="header__link btn btn-primary btn-lg">Ver Reservas</a>
                        <?php
                    } else {
                        ?>
                        <a href="./index.php?controller=&action=" class="header__link btn btn-primary btn-lg">Ver mis reservas</a>
                        <?php
                    }
                    ?>
                    <a href="./index.php?controller=Usuarios&action=cerrarSesion" class="btn btn-danger btn-lg">Cerrar Sesión</a>
                </div>
                <p class="lead">Bienvenido a nuestra plataforma de hoteles.</p>
                <hr class="my-4">
            </div>

            <h2 class="mb-4">Habitaciones del hotel <?php echo $id_hotel ?> </h2>
            <?php
            if (isset($_GET["error"]) && $_GET["error"] == "fecha") {
                ?>
                <div class="alert alert-danger" role="alert">
                    La fecha introducida no es correcta, vuelve a intentarlo.
                </div>
                <?php
            }
            ?>
            <!-- Agregar la tabla -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tipo de Habitación</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <?php
                            if ($_SESSION["rol"] == 0) {
                                ?>
                                <th>Acciones</th>
                                </td>
                                <?php
                            }
                            ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($habitaciones as $habitacion) { ?>
                            <tr>
                                <td><?php echo $habitacion->getTipo() ?></td>
                                <td><?php echo $habitacion->getDescripcion() ?></td>
                                <td><?php echo $habitacion->getPrecio() ?></td>
                                <?php
                                if ($_SESSION["rol"] == 0) {
                                    ?>
                                    <td>
                                        <form method="post" action="./index.php?controller=Reservas&action=validarReserva">
                                            <input type="hidden" name="habitacion_id" value="<?php echo $habitacion->getId() ?>">
                                            <input type="hidden" name="hotel_id" value="<?php echo $habitacion->getId_hotel() ?>">
                                            <label for="fechaEntrada_<?php echo $habitacion->getId() ?>">Fecha de Entrada:</label>
                                            <input type="date" class="form-control" min="<?php echo $fecha ?>" name="fechaEntrada" required>
                                            <label for="fechaSalida_<?php echo $habitacion->getId() ?>">Fecha de Salida:</label>
                                            <input type="date" class="form-control" min="<?php echo $fecha ?>" name="fechaSalida" required>
                                            <button type="submit" class="btn btn-primary mt-2" name="reservar">Reservar</button>
                                        </form>
                                    </td>
                                    <?php
                                }
                                ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }

}
?>
