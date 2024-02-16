<?php

include_once 'db/DB.php';

class HabitacionesModel {

    // Obtiene una instancia de PDO para conectarse a la base de datos
    private $bd;
    private $pdo;

    public function __construct() {
        $this->bd = new DB();
        $this->pdo = $this->bd->getPDO();
    }

    /**
     * Funcion que obtiene las habitaciones de un hotel
     * @return array de habitaciones
     */
    public function getHabitaciones($id_hotel) {
        $sql = "SELECT h.*, hab.* FROM habitaciones hab JOIN hoteles h ON hab.id_hotel = h.id WHERE h.id = :id_hotel;";
        $stmnt = $this->pdo->prepare($sql);
        $stmnt->execute(array(":id_hotel" => $id_hotel));
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }

}
