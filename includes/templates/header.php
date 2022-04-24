<?php
// Validar si la sessione esta iniciada
if (!isset($_SESSION)) {
    session_start();
}
$autenticar=$_SESSION['login']??false;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">  -->
    <!-- Preload -->
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header class="header <?php echo $imagen ? 'imagen' : '' ?>">
        <div class="<?php echo $imagen ? 'header__contenido' : '' ?> contenedor">
            <div class="barra">
                <a href="/">
                    <img class="logo" src="/build/img/logo.svg" alt="logo">
                </a>
                <div class="mobil_menu">
                    <img src="/build/img/barras.svg" alt="Menu Movil">
                </div>
                <nav class="nav">
                    <img src="/build/img/dark-mode.svg" alt="dark" class="dark-mode-btn">
                    <a class="nav__enlace" href="/nosotros.php">Nosotros</a>
                    <a class="nav__enlace" href="/anuncios.php">Anuncios</a>
                    <a class="nav__enlace" href="/blog.php">Blog</a>
                    <a class="nav__enlace" href="/contacto.php">Contacto</a>
                    <?php if($autenticar) :?>
                    <a class="nav__enlace" href="/cerrar-sesion.php">Cerrar sesión</a>
                    <?php endif?>
                    <?php if(!$autenticar) :?>
                    <a class="nav__enlace" href="/login.php">Iniciar sesión</a>
                    <?php endif?>
                </nav>
            </div>  
            <?php $imagen ? '<h1 class="header__titulo"> Venta de casas y departamentos de lujo</h1>' : '' ?>
        </div>
    </header>