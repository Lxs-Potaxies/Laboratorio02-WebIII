<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo urlRoot; ?>/css/estilo_02.css">
    <?php require_once(appRoot . '/views/includes/enca.php'); ?>
    <title><?php echo $data['title']; ?></title>
</head>
<body class="container">
    <header class="col-12">
        <?php require_once(appRoot . '/views/includes/menu.php'); ?>        
    </header>
    <main class="col-12 linea_sep">
        <h1><?php echo $data['title']; ?></h1>
        <p>La comida italiana es una de las cocinas más apreciadas del mundo. Con su rica tradición y sabores distintivos, ofrece una variedad de platos que deleitan a todos. La gastronomía italiana no solo es famosa por sus recetas, sino también por su enfoque en la calidad de los ingredientes y la simplicidad en la preparación.</p>

        <h2>Historia de la Comida Italiana</h2>
        <p>La historia de la comida italiana es tan rica y variada como la cultura del país. Desde la antigua Roma, donde la comida era un elemento esencial de la vida social, hasta la influencia de los diferentes reinos y regiones, la cocina italiana ha evolucionado con el tiempo. En la actualidad, cada región de Italia tiene su propia cocina única, influenciada por sus tradiciones locales y la disponibilidad de ingredientes frescos.</p>

        <h2>Platos Típicos</h2>
        <ul>
            <li><strong>Pizza:</strong> Originaria de Nápoles, la pizza es uno de los platos más emblemáticos de Italia. Se caracteriza por su masa delgada y crujiente, cubierta con salsa de tomate, mozzarella y una variedad de ingredientes frescos.</li>
            <li><strong>Pasta:</strong> Hay miles de tipos de pasta en Italia, desde espaguetis hasta raviolis. La pasta se sirve con diversas salsas, como el clásico pesto, ragú o salsa de tomate.</li>
            <li><strong>Lasagna:</strong> Este plato está hecho de capas de pasta intercaladas con carne, salsa y queso. Es un favorito en muchas familias italianas y se ha convertido en un clásico en todo el mundo.</li>
            <li><strong>Risotto:</strong> Un plato cremoso hecho con arroz arborio, cocido lentamente en caldo, y a menudo enriquecido con ingredientes como setas, mariscos o verduras.</li>
            <li><strong>Bruschetta:</strong> Tostadas de pan cubiertas con tomate fresco, albahaca y aceite de oliva. Es un antipasto popular y un excelente comienzo para cualquier comida italiana.</li>
            <li><strong>Tiramisú:</strong> Este postre es famoso por su combinación de café, queso mascarpone y cacao en polvo. Su nombre significa "anímame" en italiano, y es un favorito para los amantes de los dulces.</li>
        </ul>

        <h2>Influencia Global</h2>
        <p>La comida italiana ha tenido un impacto significativo en la gastronomía global. Restaurantes italianos se pueden encontrar en casi todas las ciudades del mundo, y la pizza es un plato universalmente amado. Además, las técnicas culinarias italianas han influido en muchas otras cocinas, adaptándose a los gustos locales mientras mantienen su esencia italiana.</p>

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

            <form action="<?php echo urlRoot; ?>/pages/comida" method="post">
                <div>
                    <label for="author">Nombre:</label>
                    <input type="text" name="author" required>
                </div>
                <div>
                    <label for="content">Comentario:</label>
                    <textarea name="content" required></textarea>
                </div>
                <input type="hidden" name="post_id" value="2"> <!-- Asegúrate de que el ID sea correcto -->
                <button type="submit">Enviar</button>
            </form>
        </section>
    </main>
    <footer>
        <?php require_once(appRoot . '/views/includes/pie.php'); ?>
    </footer>
</body>
</html>
