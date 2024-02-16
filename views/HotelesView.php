<?php

class HotelesView {

    /**
     * Funcion que muestra los hoteles.
     */
    public function mostrarHoteles($newHoteles) {
        session_start();
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

            <h2 class="mb-4">Listado de Hoteles:</h2>
            <!-- Agregar la tabla -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>País</th>
                            <th>Habitaciones</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($newHoteles as $hotel) { ?>
                            <tr>
                                <td><?php echo $hotel->getNombre() ?></td>
                                <td><?php echo $hotel->getDireccion() ?></td>
                                <td><?php echo $hotel->getCiudad() ?></td>
                                <td><?php echo $hotel->getPais() ?></td>
                                <td><?php echo $hotel->getNum_habitaciones() ?></td>
                                <td><?php echo $hotel->getDescripcion() ?></td>
                                <td>
                                    <a href="./index.php?controller=Habitaciones&action=listarHabitaciones&id=<?php echo $hotel->getId() ?>" class="btn btn-primary">Ver Habitaciones</a> 
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
