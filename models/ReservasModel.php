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

//    public function comprobarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida) {
//        try {
//            $sql = 'SELECT COUNT(*) FROM reservas WHERE id_hotel = :id_hotel AND id_habitacion = :id_habitacion AND NOT (fecha_entrada >= :fecha_salida OR fecha_salida <= :fecha_entrada);';
//            $reservas = $this->pdo->prepare($sql);
//            $reservas->execute(array('id_hotel' => $id_hotel, 'id_habitacion' => $id_habitacion, 'fecha_entrada' => $fecha_entrada, 'fecha_salida' => $fecha_salida));
//
//            $reserva = $reservas->fetchColumn();
//
//            if ($reserva > 0) {
//                return false;
//            } else {
//                return true;
//            }
//        } catch (Exception $e) {
//            echo "Error para comprobar la reserva: " . $e->getMessage();
//        }
//    }
//
//    public function insertarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida) {
//        try {
//            // Obtener el máximo ID de la tabla reservas
//            $sqlMaxID = "SELECT MAX(id) 'idMax' FROM reservas";
//            $MaxID = $this->pdo->prepare($sqlMaxID);
//            $MaxID->execute();
//            $maxIDResult = $MaxID->fetch(PDO::FETCH_ASSOC);
//            $nuevoID = $maxIDResult['idMax'] + 1;
//
//            // INSERT de la nueva reserva
//            $sql = "INSERT INTO reservas (id, id_usuario, id_hotel, id_habitacion, fecha_entrada, fecha_salida) "
//                    . "VALUES(:id, :id_usuario, :id_hotel, :id_habitacion, :fecha_entrada, :fecha_salida);";
//            $insertReserva = $this->pdo->prepare($sql);
//            $insertReserva->execute(array('id' => $nuevoID, 'id_usuario' => $_SESSION['id'], 'id_hotel' => $id_hotel, 'id_habitacion' => $id_habitacion, 'fecha_entrada' => $fecha_entrada, 'fecha_salida' => $fecha_salida));
//
//            header('Location: index.php?controller=Reserva&action=usuarioReservas&success');
//        } catch (Exception $e) {
//            echo "Error al insertar una reserva: " . $e->getMessage();
//        }
//    }

}

?>
