<main>
    <h1 class="titulo__form">Registrate infante</h1>
    <p class="descripcion">Contesta el siguiente formulario</p>

<form action="" method="POST" class="formulario contenedor">
<?php
    $idTutor=$_SESSION['id'];
    include_once __DIR__ . '/../autenticacion/alertas.php';    
?>
    <fieldset>
        <legend>Datos generales</legend>
    <div class="tres_campos">
        <div class="campo">
            <label class="campo__label" for="nombre">Nombre:</label>
            <input class="campo__input" type="text" id="nombre" placeholder="Ingrese su nombre" name="nombre" 
            value="<?php echo sanitizar($infante->nombre)?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="apellidoPat">Apellido Paterno:</label>
            <input class="campo__input" type="text" id="apellidoPat" placeholder="Ingrese su apellido paterno" name="apellidoPat" value="<?php echo sanitizar($infante->apellidoPat)?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="apellidoMat">Apellido Materno:</label>
            <input class="campo__input" type="text" id="apellidoMat" placeholder="Ingrese su apellido materno" name="apellidoMat" value="<?php echo sanitizar($infante->apellidoMat)?>">
        </div>
    </div>
        <div class="tres_campos">
            <div class="campo">
                <label class="campo__label" for="fechaNacimiento">Fecha de nacimiento:</label>
                <input class="campo__input" type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo sanitizar($infante->fechaNacimiento)?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="sexo">Sexo:</label>
                <select class="campo__input" name="sexo" id="sexo" requeried >
                    <option value="" selected disabled>--Sin seleccionar--</option>
                    <option <?php echo ($infante->sexo) == 0? 'selected':''?> value="0">Mujer</option>
                    <option <?php echo ($infante->sexo) == 1? 'selected':''?>value="1">Hombre</option>
                </select>
            </div>
            <div class="campo">
                <label class="campo__label" for="estudia">¿Estudia?:</label>
                <select class="campo__input" name="estudia" id="estudia" requeried >
                    <option value="" selected disabled>--Sin seleccionar--</option>
                    <option <?php echo ($infante->estudia) == 0? 'selected':''?> value="1">Si</option>
                    <option <?php echo ($infante->estudia) == 1? 'selected':''?>value="0">No</option>
                </select>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Datos especificos:</legend>
        <div class="dos_campos">
            <div class="campo">
                <label class="campo__label" for="altura">Altura:</label>
                <input class="campo__input" type="number" id="altura" placeholder="Ingrese su altura" name="altura" step="0.01"
                value="<?php echo sanitizar($infante->altura)?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="peso">Peso:</label>
                <input class="campo__input" type="tel" id="peso" placeholder="Ingrese su peso" name="peso"
                value="<?php echo sanitizar($infante->peso)?>">
            </div>
            <input type="hidden" name="idUsuario" value="<?php echo $idTutor?>">
        </div>
    </fieldset>
    <div class="space_between">
        <a href="/inicio" class="btn">Volver al inicio</a>
        <input type="submit" class="btn-enviar" value="Registrar infante">
    </div>
</form>
</div>
</main>