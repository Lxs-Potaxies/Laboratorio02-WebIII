<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="<?php echo urlRoot; ?>/css/estilo_04.css">
    <?php require_once(appRoot . '/views/includes/enca.php'); ?>
    <title><?php echo siteName; ?></title>
</head>
<body class="container">
    <header class="col-12">
        <?php require_once(appRoot . '/views/includes/menu.php'); ?>        
    </header>
    <main class="col-12 linea_sep">
        <?php
        // Mostrar título
        echo '<h3>' . $data['title'] . '</h3>';

        // Verificar si el usuario está autenticado
        if (isLoggedIn()) {
            echo "Usuario conectado: " . $_SESSION['usuario'];
        } else {
            echo "Por favor autentíquese ante nosotros...";
        }

        // Mostrar contenido reciente del blog
        echo "<h4>Contenido Reciente</h4>";
        if (!empty($data['recent_posts'])) {
            foreach ($data['recent_posts'] as $post) {
                echo '<div class="post">';
                // Mostrar el título sin enlace
                echo '<h5>' . $post->title . '</h5>';
                
                // Mostrar contenido sin enlace
                echo '<p>' . substr($post->content, 0, 100) . '...</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No hay publicaciones recientes disponibles.</p>';
        }
        ?>
    </main>
    <footer class="col-12 linea_sep">
        <?php require_once(appRoot . '/views/includes/pie.php'); ?>
    </footer>
</body>
</html>
