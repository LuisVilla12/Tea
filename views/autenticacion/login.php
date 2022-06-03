<main class="contenedor-min">
    <?php 
        include_once __DIR__ . '/alertas.php';    
        ?>
    <div class="login">
        <div class="login__grid contenedor">
            <div class="login__seccion1"></div>
            <div class="login__seccion2">
                <div class="contenedor-max">
                    <h2 >Ingresa tus datos para iniciar sesión</h2>
                    <form action="" method="POST" class="login_form">
                        <div class="campo">
                            <!-- <label class="campo__label" for="correo">Correo electrónico:</label> -->
                            <input class="campo__input" type="email" id="correo" placeholder="Correo electrónico" name="correo" >
                        </div>
                        <div class="campo">
                            <!-- <label class="campo__label" for="contraseña">Contraseña:</label> -->
                            <input class="campo__input" type="password" id="contraseña" placeholder="Contraseña" name="contraseña">
                        </div>
                        <div class="centrar">
                            <input type="submit" class="btn-enviar" value="Iniciar sesión">
                        </div>
                        <div class="acciones">
                            <a href="/crear-cuenta">¿Aún no tienes una cuenta? 
                                <span> Crear una aquí</span></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>