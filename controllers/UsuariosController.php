<?php

class UsuariosController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UsuariosModel();
        $this->view = new UsuariosView();
    }

    /**
     * MUESTRA LA VISTA DE MOSTRAR LOGIN.
     */
    public function login() {
        $this->view->mostrarLogin();
    }
    public function validarLogin() { 
        $user = $_POST['user'];
        $password = hash("sha256", $_POST['password']);

        $loginValidado = $this->model->comprobarUsuario($user, $password);

        if ($loginValidado) {
            session_start();
            $_SESSION['usuario'] = $user;
            $fecha = date('d-m-Y H:i:s');
            setcookie("conexion", $fecha, time() + 20 * 24 * 3600, "/");
            echo "LOGIN CORRECTO $loginValidado";
            //AÑADIR EL HEADER DONDE QUIERO QUE ME LLEVE SI EL USUARIO ES CORRECTO
        } else {
            echo 'LOGIN INCORRECTO';
            header("Location: ./index.php?error=incorrecto");
        }
    }

}
