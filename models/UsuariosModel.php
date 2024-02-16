<?php

include './db/DB.php';

class UsuariosModel {

    // Obtiene una instancia de PDO para conectarse a la base de datos
    private $bd;
    private $pdo;

    public function __construct() {
        $this->bd = new DB();
        $this->pdo = $this->bd->getPDO();
    }
    
    /**
     * Funcion que comprueba si el usuario y contraseña existen en la bd
     * @param type $user
     * @param type $password
     * @return boolean
     */
    public function comprobarUsuario($user, $password) {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE nombre = :user AND contraseña = :password');
        $stmt->execute(array(":user" => $user, ":password" => $password));
        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario['rol'];
        } else {
            return false;
        }
    }

}
