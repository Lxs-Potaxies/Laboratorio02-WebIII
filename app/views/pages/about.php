<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="<?php echo urlRoot; ?>/css/estilo_03.css">
    <?php require_once(appRoot . '/views/includes/enca.php'); ?>
    <title>Acerca de - <?php echo siteName; ?></title>
</head>
<body class="container">
    <header class="col-12">
        <?php require_once(appRoot . '/views/includes/menu.php'); ?>        
    </header>
    <main class="col-12 linea_sep">
        <h3>Acerca de Nosotros</h3>
        <p>Bienvenido a nuestra página "Acerca de". Aquí encontrarás información sobre nuestro grupo y nuestros miembros.</p>
        
        <h4>Quiénes somos:</h4>
        <p>Lindsay Salazar Carrillo <br>
		Iker La Red Morales <br>
		Kristel Cantillano Mojica</p>

        <h4>Nuestros Signos</h4>
        <ul>
            <li>Sagitario</li>
            <li>Tauro</li>
            <li>Aries</li>
        </ul>

        <h4>Fechas de cumpleaños</h4>
        <ul>
            <li>04/12/2002</li>
            <li>02/05/2003</li>
			<li>31/03/2004</li>
        </ul>
        
        <?php if (isLoggedIn()): ?>
            <p>Usuario conectado: <?php echo $_SESSION['usuario']; ?></p>
        <?php else: ?>
            <p>Por favor autentíquese para acceder a más información sobre el equipo. <a href="login.php">Iniciar sesión</a></p>
        <?php endif; ?>
    </main>
    <footer class="col-12 linea_sep">
        <?php require_once(appRoot . '/views/includes/pie.php'); ?>
    </footer>
</body>
</html>
