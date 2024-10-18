<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="<?php echo urlRoot; ?>/css/estilo_02.css">
    <?php require_once(appRoot . '/views/includes/enca.php'); ?>
    <title>VMAs 2024</title>
</head>
<body class="container">
    <header class="col-12">
        <?php require_once(appRoot . '/views/includes/menu.php'); ?>        
    </header>
    <main class="col-12 linea_sep">
        <h1>Video Music Awards 2024</h1>
        
        <section>
            <h2>Fecha y Lugar</h2>
            <p>Los Video Music Awards 2024 se llevarán a cabo el 12 de septiembre de 2024 en el Barclays Center, Brooklyn, Nueva York.</p>
        </section>

        <section>
            <h2>Nominaciones Destacadas</h2>
            <ul>
                <li><strong>Mejor Artista:</strong> Taylor Swift, Bad Bunny, Harry Styles, Billie Eilish.</li>
                <li><strong>Mejor Álbum:</strong> "Midnights" de Taylor Swift, "Un Verano Sin Ti" de Bad Bunny, "Harry's House" de Harry Styles.</li>
                <li><strong>Mejor Video del Año:</strong> "Anti-Hero" de Taylor Swift, "As It Was" de Harry Styles, "Vampire" de Olivia Rodrigo.</li>
            </ul>
        </section>

        <section>
            <h2>Presentaciones Especiales</h2>
            <p>Este año, los VMAs 2024 contarán con actuaciones de artistas como:</p>
            <ul>
                <li>Billie Eilish</li>
                <li>Bad Bunny</li>
                <li>Doja Cat</li>
                <li>Olivia Rodrigo</li>
            </ul>
        </section>

        <section>
            <h2>Historia de los VMAs</h2>
            <p>Los Video Music Awards, conocidos como VMAs, son un evento anual de premios de música organizado por MTV que celebra la excelencia en la producción de videos musicales y el arte de la música.</p>
        </section>
        
        <section>
            <h2>Cómo Ver los VMAs 2024</h2>
            <p>Los VMAs 2024 se transmitirán en vivo en MTV y se podrá ver en línea a través de la aplicación de MTV y otros servicios de streaming que ofrecen el canal.</p>
        </section>

        <section>
            <h3>Comentarios</h3>
            <div id="comments">
                <?php if (!empty($data['comments'])): ?>
                    <?php foreach ($data['comments'] as $comment): ?>
                        <div class="comment">
                            <p><strong><?php echo htmlspecialchars($comment->author); ?>:</strong> <?php echo htmlspecialchars($comment->content); ?></p>
                            <p><em><?php echo htmlspecialchars($comment->created_at); ?></em></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay comentarios aún.</p>
                <?php endif; ?>
            </div>

            <h3>Agregar un Comentario</h3>
            <form action="<?php echo urlRoot; ?>/pages/vmas" method="post"> <!-- Ajuste en la ruta -->
                <div>
                    <label for="author">Nombre:</label>
                    <input type="text" name="author" required>
                </div>
                <div>
                    <label for="content">Comentario:</label>
                    <textarea name="content" required></textarea>
                </div>
                <input type="hidden" name="post_id" value="1"> <!-- Asegúrate de cambiar esto según tu lógica -->
                <button type="submit">Enviar</button>
            </form>
        </section>
    </main>
    <footer class="col-12 linea_sep">
        <?php require_once(appRoot . '/views/includes/pie.php'); ?>
    </footer>
</body>
</html>
