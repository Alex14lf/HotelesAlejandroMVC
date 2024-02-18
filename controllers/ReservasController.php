<?php

class ReservasController {

    private $model;

//    private $view;

    public function __construct() {
        $this->model = new ReservasModel();
        $this->view = new ReservasView();
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

    public function mostrarReservasUsuario() {
        session_start();

        if (!$_SESSION["usuario"]) {
            header("Location: ./index.php?controller=Usuarios&action=login");
        }

        if ($_SESSION["rol"] == 1) {
            $reservasUsuario1 = $this->model->getReservasUsuario(1);
            $reservasUsuario2 = $this->model->getReservasUsuario(2);
            foreach ($reservasUsuario1 as $reserva) {
                // Crear un objeto Reserva y añadirlo al array
                $reservasTotales[] = new Reserva($reserva['id'],$reserva['id_usuario'], $reserva['id_hotel'], $reserva['id_habitacion'], $reserva['fecha_entrada'], $reserva['fecha_salida']);
            }
            foreach ($reservasUsuario2 as $reserva) {
                // Crear un objeto Reserva y añadirlo al array
                $reservasTotales[] = new Reserva($reserva['id'],$reserva['id_usuario'], $reserva['id_hotel'], $reserva['id_habitacion'], $reserva['fecha_entrada'], $reserva['fecha_salida']);
            }
        } else {
            $reservasUsuario = $this->model->getReservasUsuario($_SESSION['id']);

            foreach ($reservasUsuario as $reserva) {
                $reservasTotales[] = new Reserva($reserva['id'],$reserva['id_usuario'], $reserva['id_hotel'], $reserva['id_habitacion'], $reserva['fecha_entrada'], $reserva['fecha_salida']);
            }
        }
        $this->view->mostrarReservas($reservasTotales);
    }

}
?>



