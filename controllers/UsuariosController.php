<?php

class UsuariosController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UsuariosModel();
        $this->view = new UsuariosView();
    }

    // Muestra la lista de tareas
    public function mostrar() {
        // Muestra la vista de mostrarFormulario
        $this->view->mostrarLogin();
    }

}
