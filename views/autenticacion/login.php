<main class="contenedor-max">
    <h1 class="titulo__form">Login</h1>
    <p class="descripcion">Inicia sesión con tus datos</p>
    <?php 
        include_once __DIR__ . '/alertas.php';    
    ?>
    <form action="" method="POST" class="formulario">
        <div class="campo">
            <label class="campo__label" for="correo">Correo electronico:</label>
            <input class="campo__input" type="email" id="correo" placeholder="Ingrese su correo electronico" name="correo" >
        </div>
        <div class="campo">
            <label class="campo__label" for="contraseña">Contraseña:</label>
            <input class="campo__input" type="password" id="contraseña" placeholder="Ingrese su contraseña" name="contraseña">
        </div>
        <div class="centrar">
            <input type="submit" class="btn-enviar" value="Iniciar sesión">
        </div>
    </form>
    <div class="acciones">
        <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una aquí</a>
        <a href="/olvide">¿Olvidaste tu contraseña?</a>
    </div>
</main>