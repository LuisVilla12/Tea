<?php 
// debuguear($_SESSION);
$logueado= $_SESSION['logueado']?? 0
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEA PUZZLE</title>
    <link rel="icon" type="image/jpg" href="build/img/ico.ico">
    <link rel="preload" href="build/css/app.css" as="style">
    <link rel="stylesheet" href="build/css/app.css">
    <!-- fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Chela+One&family=Fredoka:wght@300;400;500&family=Lemon&family=Monofett&display=swap" rel="stylesheet">
    <!-- Slider -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" /> -->
</head>

<body>
    <header class="header">
        <div class="header__barra contenedor">
            <div class="header__logo">
                <img src="build/img/iconoo.png" alt="logotipo" class="header__img">
                <a href="/">
                    <p class="header__titulo">
                        TEA <span>PUZZLE</span>
                    </p>
                </a>
            </div>
            <ul class="nav">
                <li>
                    <a href="/conocenos" class="nav__a">
                        <i class="fa-solid fa-magnifying-glass"></i>Conócenos</a>
                </li>
                <li>
                    <a href="/materia-de-apoyo" class="nav__a">
                        <i class="fa-solid fa-book-open"></i>Material de apoyo</a>
                    
                </li>

                <?php if($logueado):?>
                <li>
                    <a href="/logout" class="nav__a">
                        <i class="fa-solid fa-user"></i>Cerrar sesión</a>
                </li>
                <?php else:?>
                <li>
                    <a href="/login" class="nav__a">
                        <i class="fa-solid fa-user"></i>Registrarse</a>
                </li>
                <?php endif?>
            </ul>
            <div class="menu">
                <a href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
        </div>
    </header>
    <section class="menu__hidden"></section>
    <?php echo $contenido; ?>
    <footer class="footer">
        <div class="footer__grid contenedor">
            <div class="ubicacion">
                <h3>Ubicación</h3>
                <div class="ubicacion__contenido">
                    <div class="ubicacion__mapa">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3760.906593939934!2d-96.88233098544326!3d19.502654043491397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85db324c8ce295c7%3A0x4da58d2adc774de0!2sTecNM%20-%20Campus%20Instituto%20Tecnol%C3%B3gico%20Superior%20de%20Xalapa!5e0!3m2!1ses-419!2smx!4v1645774053734!5m2!1ses-419!2smx"
                            height="100%" width="100%" style="border:0;" allowfullscreen="" loading="lazy" class="ubicacion__map"></iframe>
                    </div>
                    <div class="ubicacion__descripcion">
                        <div class="ubicacion__txt">
                            <p> <i class="fa-solid fa-location-dot"></i>Sección 5A Reserva Territorial S/N,Santa Bárbara 91096 </p>
                            <div class="txt">
                                <p><i class="fa-solid fa-map-location"></i>Xalapa-Enríquez, Ver.</p>
                                <p><i class="fa-solid fa-phone"><a href="tel:228 165 0525"></i>228 165 0525</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="ubicacion__maks">
                        <img src="build/img/ITSX.png" alt="logo" class="ubicacion__itsx">
                    </div>
                </div>

            </div>
            <div class="redes">
                <h3>Contáctanos</h3>
                <nav class="redes__iconos">
                    <a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://wa.me/522282552625?text=Hola" target="_blank">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="https://www.instagram.com" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="" target="_blank">
                        <i class="fa-solid fa-envelope"></i>
                    </a>
                </nav>
            </div>
        </div>
        <div class="copy">
            <p>&copy;Todos los derechos reservados 2022</p>
        </div>
    </footer>
</body>
<script src="https://kit.fontawesome.com/d2c5d4b6e4.js" crossorigin="anonymous"></script>
<script src="../build/app.js"></script>
<?php echo $script?? '';?>
<!-- <script src="../build/eleccionPC.js" ></script> -->
<!-- <script src="../build/eleccionMV.js"></script> -->
</html>