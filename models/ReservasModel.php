<?php

/**
 * Clase ReservaModel que gestiona las operaciones relacionadas con las reservas.
 */
class ReservasModel {

    private $bd;
    private $pdo;

    /**
     * Constructor de la clase ReservaModel.
     * Inicializa la instancia de la base de datos y el objeto PDO.
     */
    public function __construct() {
        $this->bd = new DB();
        $this->pdo = $this->bd->getPDO();
    }

    public function comprobarReserva($habitacion_id, $hotel_id, $fechaEntrada, $fechaSalida) {
        $sql = 'SELECT COUNT(*) FROM reservas WHERE id_hotel = :id_hotel AND id_habitacion = :id_habitacion AND NOT (fecha_entrada >= :fecha_salida OR fecha_salida <= :fecha_entrada);';
        $stmnt = $this->pdo->prepare($sql);
        $stmnt->execute(array('id_hotel' => $hotel_id, 'id_habitacion' => $habitacion_id, 'fecha_entrada' => $fechaEntrada, 'fecha_salida' => $fechaSalida));
        $cantidadReservas = $stmnt->fetchColumn();
        if ($cantidadReservas > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function postReserva($habitacion_id, $hotel_id, $fechaEntrada, $fechaSalida) {
        $sql = "INSERT INTO reservas (id_usuario, id_hotel, id_habitacion, fecha_entrada, fecha_salida) VALUES (:id_usuario, :id_hotel, :id_habitacion, :fecha_entrada, :fecha_salida);";
        $insertReserva = $this->pdo->prepare($sql);
        $insertReserva->execute(array('id_usuario' => $_SESSION['id'], 'id_hotel' => $hotel_id, 'id_habitacion' => $habitacion_id, 'fecha_entrada' => $fechaEntrada, 'fecha_salida' => $fechaSalida));
        header("Location: ./index.php?controller=Habitaciones&action=listarHabitaciones&id=$hotel_id&reserva=exitosa");
    }

}

?>
