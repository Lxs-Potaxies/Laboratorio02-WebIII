<?php
class Post {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Obtener las publicaciones más recientes
    public function getRecentPosts(){
        $this->db->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT 5");
        return $this->db->resultSet();
    }

    // Obtener publicaciones por categoría
    public function getPostsByCategory($category){
        $this->db->query("SELECT * FROM posts WHERE category = :category ORDER BY created_at DESC");
        $this->db->bind(':category', $category);
        return $this->db->resultSet();
    }

    // Obtener publicación por ID
    public function getPostById($id) {
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single(); // Asegúrate de que `single()` obtiene un solo resultado
    }
}
?>

