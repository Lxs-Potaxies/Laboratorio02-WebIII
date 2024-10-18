<?php
require_once(appRoot . '/views/includes/header.php');
?>

<main class="container">
    <article>
        <h2><?php echo htmlspecialchars($data['post']->title); ?></h2>
        <p><?php echo nl2br(htmlspecialchars($data['post']->content)); ?></p>
    </article>

    <section>
        <h3>Comentarios</h3>
        <?php if (!empty($data['comments'])): ?>
            <?php foreach ($data['comments'] as $comment): ?>
                <div class="comment">
                    <p><strong><?php echo htmlspecialchars($comment->name); ?>:</strong> <?php echo htmlspecialchars($comment->comment); ?></p>
                    <p><em><?php echo htmlspecialchars($comment->created_at); ?></em></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay comentarios todavía.</p>
        <?php endif; ?>
    </section>

    <section>
        <h3>Agregar un Comentario</h3>
        <form action="add_comment.php" method="post">
            <div>
                <label for="name">Nombre:</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label for="comment">Comentario:</label>
                <textarea name="comment" required></textarea>
            </div>
            <input type="hidden" name="post_id" value="<?php echo $data['post']->id; ?>">
            <button type="submit">Enviar</button>
        </form>
    </section>
</main>

<?php require_once(appRoot . '/views/includes/footer.php'); ?>

