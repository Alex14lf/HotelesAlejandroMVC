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
                echo 'SALES ANTES DE ENTRAR';
//                $validarReserva = $this->model->comprobarReserva($habitacion_id, $hotel_id, $fechaEntrada, $fechaSalida);
//                if ($validarReserva) {
//                    $insertarReserva = $this->model->insertarReserva($habitacion_id, $hotel_id, $fechaEntrada, $fechaSalida);
//                }else{
//                     header("Location: ./index.php?controller=Hoteles&action=listarHoteles&error=existente");
//                }
            } else {
                header("Location: ./index.php?controller=Habitaciones&action=listarHabitaciones&id=$hotel_id&error=fecha");
            }
        }
    }

}
?>



