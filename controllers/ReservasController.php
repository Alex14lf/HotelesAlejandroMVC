<?php

class ReservasController {

    private $model;

//    private $view;

    public function __construct() {
        $this->model = new ReservasModel();
//        $this->view = new ReservasView();
    }

    public function validarReserva() {
        session_start();
        if ($_SESSION['usuario']) {
            $habitacion_id = $_POST['habitacion_id'];
            $hotel_id = $_POST['hotel_id'];
            $fechaEntrada = $_POST['fechaEntrada'];
            $fechaSalida = $_POST['fechaSalida'];

            if ($fechaEntrada < $fechaSalida) {
                $validarReserva = $this->model->comprobarReserva($habitacion_id, $hotel_id, $fechaEntrada, $fechaSalida);
                if ($validarReserva) {
                    header("Location: ./index.php?controller=Habitaciones&action=listarHabitaciones&id=$hotel_id&error=existente");
                } else {
                    $this->model->postReserva($habitacion_id, $hotel_id, $fechaEntrada, $fechaSalida);
                }
            } else {
                header("Location: ./index.php?controller=Habitaciones&action=listarHabitaciones&id=$hotel_id&error=fecha");
            }
        }
    }

}
?>



