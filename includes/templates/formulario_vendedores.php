<fieldset>
    <legend>Informacion general</legend>
    <div class="campo">
        <label class="campo__label" for="nombre">Nombre: </label>
        <input class="campo__input" type="text" id="nombre" name="vendedor[nombre]" placeholder="Ingrese el nombre del vendedor" value="<?php echo sanitizar($vendedor->nombre); ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="apellidos">Apellidos: </label>
        <input class="campo__input" type="text" id="apellidos" name="vendedor[apellido]" placeholder="Ingrese el nombre del vendedor" value="<?php echo sanitizar($vendedor->apellido); ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="telefono">Telefono: </label>
        <input class="campo__input" type="number" id="telefono" name="vendedor[telefono]" placeholder="Ingrese el n° de telefono" value="<?php echo sanitizar($vendedor->telefono); ?>">
    </div>
</fielset>