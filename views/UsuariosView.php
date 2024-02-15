<?php

class UsuariosView {

    /**
     * FUNCION QUE MUESTRA EL LOGIN.
     */
    public function mostrarLogin() {
        ?>
        <div class="container">
            <div class="login-container">
                <h2 class="login-heading">HOTELES ALEJANDRO</h2>
                <form class="login-form" action="./index.php?controller=Usuarios&action=validarLogin" method="POST">
                    <div class="mb-3">
                        <label for="inputUser" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="inputUser" name="user">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="inputPassword" name="password">
                    </div>
                    <?php
                    if (isset($_GET["error"]) && $_GET["error"] == "incorrecto") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Usuario o contraseña incorrectos. Por favor, inténtelo de nuevo.
                        </div>
                        <?php
                    }
                    ?>
                    <button type="submit" class="btn btn-primary">Acceder</button>
                </form>
            </div>
        </div>
        <?php
    }

}
?>

