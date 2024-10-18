<?php
class Comment {
    private $db;

    public function __construct(){
        // Inicializa la base de datos
        $this->db = new Database;
    }

    // Obtener los comentarios por el ID del post
    public function getCommentsByPostId($post_id){
        $query = "SELECT * FROM comments WHERE post_id = :post_id ORDER BY created_at DESC";
        $this->db->query($query);
        $this->db->bind(':post_id', $post_id);
        
        // Retorna el conjunto de resultados
        return $this->db->resultSet();
    }

    // Agregar un comentario a un post
    public function addComment($data){
        // Definir la consulta SQL para insertar el comentario
        $query = "INSERT INTO comments (post_id, author, content, created_at) VALUES (:post_id, :author, :content, NOW())";

        // Preparar la consulta
        $this->db->query($query);

        // Vincular los parámetros con los valores correspondientes
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':author', $data['author']);
        $this->db->bind(':content', $data['content']);

        // Ejecutar la consulta y devolver verdadero si se realizó correctamente
        return $this->db->execute();
    }

}
