<?php
class User {
    private $db;

    // Crear objeto de base de datos
    public function __construct() {
        $this->db = new Database;
    }

    // Obtener todos los usuarios
    public function getUsers() {
        $this->db->query('SELECT * FROM usuarios');
        return $this->db->resultSet();
    }

    // Login de usuario
    public function login($data) {
        $this->db->query('SELECT * FROM usuarios WHERE nombre = :nomb');
        $this->db->bind(':nomb', $data['usuario']);
        $tupla = $this->db->singleRow();
        $contra = $tupla->contrasena;

        if (password_verify($data['contra'], $contra)) {
            return $tupla;
        } else {
            return false;
        }
    }

    // Registrar un nuevo usuario
    public function register($data) {
        $this->db->query('INSERT INTO usuarios (nombre, contrasena) VALUES (:nomb, :cont)');
        $this->db->bind(':nomb', $data['usuario']);
        $this->db->bind(':cont', $data['contra']);

        return $this->db->execute();
    }

    // Validar si el usuario es administrador
    public function isAdmin($user_id) {
        $this->db->query('SELECT role FROM usuarios WHERE id = :user_id');
        $this->db->bind(':user_id', $user_id);
        $result = $this->db->singleRow();
        return $result->role === 'admin';
    }
}
?>
