<?php

// Definición de la clase HabitacionView
class HabitacionesView {

    /**
     * Funcion que muestra el listado de habitaciones
     * @param type $habitaciones
     */
    function mostrarHabitaciones($habitaciones) {
        $id_hotel = $_GET["id"];
        ?>
        <div class="container mt-5 bg-white rounded shadow-lg p-4">
            <div class="jumbotron">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="display-4">Hola <?php echo $_SESSION["usuario"] ?></h1>
                    <button class="btn btn-danger btn-lg" type="button">Cerrar Sesión</button>
                </div>
                <p class="lead">Bienvenido a nuestra plataforma de hoteles.</p>
                <hr class="my-4">
            </div>

            <h2 class="mb-4">Habitaciones del hotel <?php echo $id_hotel ?> </h2>
            <!-- Agregar la tabla -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tipo de Habitación</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($habitaciones as $habitacion) { ?>
                            <tr>
                                <td><?php echo $habitacion->getTipo() ?></td>
                                <td><?php echo $habitacion->getDescripcion() ?></td>
                                <td><?php echo $habitacion->getPrecio() ?></td>
                                <td>
                                    <button class="btn btn-primary">Reservar</button>
                                </td>
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
