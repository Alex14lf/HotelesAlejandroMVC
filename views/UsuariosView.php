<?php

class UsuariosView {

    public function mostrarLogin() {
        ?>
        <div class="container">
            <div class="login-container">
                <h2 class="login-heading">HOTELES ALEJANDRO</h2>
                <form class="login-form">
                    <div class="mb-3">
                        <label for="inputUser" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="inputUser">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="inputPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Acceder</button>
                </form>
            </div>
        </div>
        <?php
    }

}
?>

