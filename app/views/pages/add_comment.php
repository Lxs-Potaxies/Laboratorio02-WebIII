<?php
require_once('config.php'); // O donde tengas tu configuración de base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? 'Anonymous'; // Si no se proporciona nombre, usar 'Anonymous'
    $comment = $_POST['comment'];
    $post_id = $_POST['post_id'];

    $commentModel = new Comment(); // Asumiendo que tienes un modelo Comment
    $commentModel->addComment($post_id, $name, $comment); // Método que deberías implementar en tu modelo

    header("Location: post.php?id=$post_id"); // Redirigir de vuelta a la publicación
    exit;
}
?>
