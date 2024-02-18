<?php

// Definición de la clase HabitacionView
class ReservasView {

    public function mostrarReservas($reservas) {
        ?>

        <div class="container mt-5 bg-white rounded shadow-lg p-4">
            <div class="jumbotron">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="display-4">Hola <?php echo $_SESSION["usuario"] ?></h1>
                    <a href="./index.php?controller=Usuarios&action=cerrarSesion" class="btn btn-danger btn-lg">Cerrar Sesión</a>
                </div>
                <p class="lead">Bienvenido a nuestra plataforma de hoteles.</p>
                <hr class="my-4">
            </div>

            <h2 class="mb-4">Listado de Reservas:</h2>

            <div class="row">
                <?php
                foreach ($reservas as $reserva) {
                    ?>
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Reserva ID: <?php echo $reserva->getId(); ?></h5>
                                <p class="card-text">Usuario ID: <?php echo $reserva->getId_usuario(); ?></p>
                                <p class="card-text">Hotel ID: <?php echo $reserva->getId_hotel(); ?></p>
                                <p class="card-text">Habitación ID: <?php echo $reserva->getId_habitacion(); ?></p>
                                <p class="card-text">Fecha de entrada: <?php echo $reserva->getFecha_entrada(); ?></p>
                                <p class="card-text">Fecha de salida: <?php echo $reserva->getFecha_salida(); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <?php
    }

}
