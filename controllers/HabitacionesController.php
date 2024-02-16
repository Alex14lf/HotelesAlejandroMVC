<?php

class HabitacionesController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new HabitacionesModel();
        $this->view = new HabitacionesView();
    }

    
    public function listarHabitaciones() {
        session_start();
        if ($_SESSION['usuario']) {
            $id_hotel=$_GET["id"];
            $habitaciones = $this->model->getHabitaciones($id_hotel);
            $newHabitaciones = array();
            foreach ($habitaciones as $habitacion) {
                $newHabitacion = new Habitacion($habitacion['id'], $habitacion['id_hotel'], $habitacion['num_habitacion'], $habitacion['tipo'], $habitacion['precio'], $habitacion['descripcion']);
                array_push($newHabitaciones, $newHabitacion);
            }
            $this->view->mostrarHabitaciones($newHabitaciones);
        } else {
            header('Location: ./index.php');
        }
    }
}
