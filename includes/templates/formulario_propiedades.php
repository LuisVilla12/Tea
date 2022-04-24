<fieldset>
    <legend>Informacion general</legend>
    <div class="campo">
        <label class="campo__label" for="titulo">Titulo: </label>
        <input class="campo__input" type="text" id="titulo" name="propiedad[titulo]" placeholder="Ingrese el titulo de la propiedad" value="<?php echo sanitizar($propiedad->titulo); ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="precio">Precio: </label>
        <input class="campo__input" type="number" id="precio" name="propiedad[precio]" placeholder="Ingrese el precio de la propiedad" value="<?php echo sanitizar($propiedad->precio); ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="imagen">Imagen: </label>
        <input class="campo__input" type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg,image/png">
        <?php if($propiedad->imagen): ?>
            <img src="/imagenes/<?php echo $propiedad->imagen?>" alt="">
        <?php endif;?>
            
    </div>
    <div class="campo">
        <label class="campo__label" for="descripcion">Descripcion: </label>
        <textarea name="propiedad[descripcion]" id="descripcion"><?php echo $propiedad->descripcion; ?></textarea>
    </div>
</fieldset>
<fieldset>
    <legend>Información de la propiedad</legend>
    <div class="campo">
        <label class="campo__label" for="habitaciones">Habitaciones: </label>
        <input class="campo__input" type="number" id="habitaciones" placeholder="Ingrese el n° de habitaciones" min="1" name="propiedad[habitaciones]" value="<?php echo sanitizar($propiedad->habitaciones); ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="wc">wc: </label>
        <input class="campo__input" type="number" id="wc" placeholder="Ingrese el n° de baños" min="1" name="propiedad[wc]" value="<?php echo sanitizar($propiedad->wc); ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="estacionamiento">Estacionamientos: </label>
        <input class="campo__input" type="number" id="estacionamiento" placeholder="Ingrese el n° de estacionamientos" min="1" name="propiedad[estacionamiento]" value="<?php echo sanitizar($propiedad->estacionamiento); ?>">
    </div>
</fieldset>
<fieldset>
    <legend>Información del vendedor</legend>
    <select name="propiedad[vendedorId]" class="campo__input" id="vendedor">
        <option value="0" selected disabled>--Sin seleccionar--</option>
        <?php foreach ($vendedores as $vendedor):?>
        <option 
            <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ''; ?>
            value="<?php echo $vendedor->id; ?>"><?php echo $vendedor->nombre . " ". $vendedor->apellido;?>
        </option>
        <?php endforeach; ?>
    </select>
</fieldset>