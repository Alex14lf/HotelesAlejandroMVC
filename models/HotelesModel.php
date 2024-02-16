<?php
include_once 'db/DB.php';

class HotelesModel {

    // Obtiene una instancia de PDO para conectarse a la base de datos
    private $bd;
    private $pdo;

    public function __construct() {
        $this->bd = new DB();
        $this->pdo = $this->bd->getPDO();
    }

    /**
     * Funcion que obtiene los hoteles
     * @return array asociativo de los hoteles.
     */
    public function getHoteles() {
        $stmnt = $this->pdo->prepare('SELECT * FROM hoteles');
        $stmnt->execute();
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }

}
