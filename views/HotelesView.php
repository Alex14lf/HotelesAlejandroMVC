<?php

class HotelesView {

    /**
     * FUNCION QUE MUESTRA LOS HOTELES.
     */
    public function mostrarHoteles($newHoteles) {
        session_start();
        ?>

        <div class="container mt-5 bg-white rounded shadow-lg p-4">
            <div class="jumbotron">
                <h1 class="display-4">Hola <?php echo $_SESSION["usuario"] ?></h1>
                <p class="lead">Bienvenido a nuestra plataforma de hoteles.</p>
                <hr class="my-4">
                <button class="btn btn-danger btn-lg" type="button">Cerrar Sesión</button>
            </div>

            <h2 class="mb-4">Listado de Hoteles:</h2>
            <div class="row">
                <?php
                foreach ($newHoteles as $hotel) {
                    ?>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $hotel->getNombre() ?></h5>
                                <p class="card-text"><?php echo $hotel->getDireccion() ?></p>
                                <p class="card-text"><?php echo $hotel->getCiudad() ?></p>
                                <p class="card-text"><?php echo $hotel->getPais() ?></p>
                                <p class="card-text"><?php echo $hotel->getNum_habitaciones() ?></p>
                                <p class="card-text"><?php echo $hotel->getDescripcion() ?></p>
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
?>
