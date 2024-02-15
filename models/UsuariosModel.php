<?php

include "./db/DB.php";

class UsuariosModel {

    // Obtiene una instancia de PDO para conectarse a la base de datos
    private $bd;
    private $pdo;

    public function __construct() {
        $this->bd = new DB();
        $this->pdo = $this->bd->getPDO();
    }

    public function comprobarUsuario($user, $password) {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE nombre = :user AND contraseña = :password');
        $stmt->execute(array(":user" => $user,":password" => $password));
        if ($stmt->rowCount() > 0) {
            return true; 
        } else {
            return false; 
        }
    }

}
