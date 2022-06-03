<div class="recuadro__form">
    <p>Registrate ahora</p>
</div>
<main class="contenedor-max centrar-contenido">
    <?php
    include_once __DIR__ . '/alertas.php';
    ?>
<form action="/crear-cuenta" method="POST" class="formulario">
    <p class="descripcion">Contesta el siguiente formulario</p>
    <fieldset>
        <legend>Datos generales</legend>
        <div class="tres_campos">
            <div class="campo">
                <!-- <label class="campo__label" for="nombre">Nombre:</label> -->
                <input class="campo__input" type="text" id="nombre" placeholder="Ingrese su nombre" name="nombre" 
                value="<?php echo sanitizar($usuario->nombre)?>">
            </div>
            <div class="campo">
                <!-- <label class="campo__label" for="apellidoPat">Apellido Paterno:</label> -->
                <input class="campo__input" type="text" id="apellidoPat" placeholder="Ingrese su apellido paterno" name="apellidoPat" value="<?php echo sanitizar($usuario->apellidoPat)?>">
            </div>
            <div class="campo">
                <!-- <label class="campo__label" for="apellidoMat">Apellido Materno:</label> -->
                <input class="campo__input" type="text" id="apellidoMat" placeholder="Ingrese su apellido materno" name="apellidoMat" value="<?php echo sanitizar($usuario->apellidoMat)?>">
            </div>
        </div>
        <div class="dos_campos">
            <div class="campo">
                <!-- <label class="campo__label" for="fechaNacimiento">Fecha de nacimiento:</label> -->
                <input class="campo__input" type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo sanitizar($usuario->fechaNacimiento)?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="sexo">Sexo:</label>
                <select class="campo__input" name="sexo" id="sexo" requeried >
                    <option value="" selected disabled>--Sin seleccionar--</option>
                    <option <?php echo ($usuario->sexo) == 0? 'selected':''?> value="0">Mujer</option>
                    <option <?php echo ($usuario->sexo) == 1? 'selected':''?>value="1">Hombre</option>
                </select>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Datos de contacto</legend>
        <div class="dos_campos">
            <div class="campo">
                <label class="campo__label" for="correo">Correo electrónico:</label>
                <input class="campo__input" type="email" id="correo" placeholder="Ingrese su correo electronico" name="correo"
                value="<?php echo sanitizar($usuario->correo)?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="telefono">Teléfono:</label>
                <input class="campo__input" type="number" id="telefono" placeholder="Ingrese su telefono" name="telefono"
                value="<?php echo sanitizar($usuario->telefono)?>">
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Datos de registro</legend>
        <div class="dos_campos">
            <div class="campo">
                <label class="campo__label" for="contraseña">Contraseña:</label>
                <input class="campo__input" type="password" id="contraseña" placeholder="Ingrese su contraseña" name="contraseña">
            </div>
            <div class="campo">
                <label class="campo__label" for="validar_contraseña">Validar contraseña:</label>
                <input class="campo__input" type="password" id="validar_contraseña" placeholder="Repita su contraseña" name="confirmar_contraseña">
            </div>
        </div>
    </fieldset>
    <div class="centrar">
        <input type="submit" class="btn-enviar" value="Crear cuenta">
    </div>
</form>
<div class="space_between mg-3">
    <a href="/crear-cuenta">¿Ya tienes una cuenta? inicia sesión</a>
    <!-- <a href="/olvide">¿Olvidaste tu contraseña?</a> -->
</div>
</main>