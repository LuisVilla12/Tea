
<fieldset>
    <legend>Información general</legend>
    <div class="tres_campos">
    <div class="campo">
        <!-- <label class="campo__label" for="nombre">Nombre del noticia: </label> -->
        <input class="campo__input" type="text" id="titulo" name="noticia[titulo]" placeholder="Ingrese el nombre del noticia" value="<?php echo sanitizar($noticia->titulo); ?>">
    </div>
    <div class="campo">
        <!-- <label class="campo__label" for="duracion">Duración: </label> -->
        <input class="campo__input" type="text" id="fuente" name="noticia[fuente]" placeholder="Ingrese la fuente de la noticia" value="<?php echo sanitizar($noticia->fuente); ?>">
    </div>
    <div class="campo">
        <!-- <label class="campo__label" for="precio_1">Precio: </label> -->
        <input class="campo__input" type="texto" id="autor" name="noticia[autor]" placeholder="Ingrese el autor de la noticia" value="<?php echo sanitizar($noticia->autor); ?>">
    </div>
    </div>
    <div class="dos_campos">
         <div class="campo">
            <!-- <label class="campo__label" for="duracion">Duración: </label> -->
            <input class="campo__input" type="date" id="fecha" name="noticia[fecha]" value="<?php echo sanitizar($noticia->fecha)?>" >
        </div>
        <div class="campo">
        <!-- <label class="campo__label" for="precio_1">Precio: </label> -->
            <input class="campo__input" type="url" id="url" name="noticia[url]" placeholder="Ingrese la url de la noticia" value="<?php echo sanitizar($noticia->url); ?>">
        </div>
    </div>
    <div class="dos_campos">
        <div class="campo">
            <label class="campo__label" for="imagen">Imagen: </label> 
            <input class="campo__input" type="file" id="imagen" name="noticia[urlImagen]">
        </div>
        <div class="campo">
            <label class="campo__label" for="descripcion">Descripción: </label>
            <textarea name="noticia[descripcion]" id="descripcion" cols="30" rows="10"><?php echo sanitizar($noticia->descripcion); ?>
            </textarea>
        </div>
    </div>    
    </div>    
</fieldset>