<h2 class="admin__titulo">Administrador de noticias</h2>
<main class="contenedor">
    <div class="space_between">
        <a href="/admin" class="btnVolver">Volver</a>
        <a href="/noticias/crear" class="btn_dos">Añadir noticia</a>
    </div>
    <table class="lista">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Fuente</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($noticias as $noticia) : ?>
                <tr>
                    <td><?php echo $noticia->id ?></td>
                    <td><?php echo $noticia->titulo ?></td>
                    <td><?php echo $noticia->fecha?></td>
                    <td><?php echo $noticia->fuente ?></td>                    
                    <td>
                        <div class="dos_columnas">
                            <div class="form_ajustar">
                                <a href="/noticias/actualizar?id=<?php echo $noticia->id; ?>" class="form_ajustar__btn amarillo" ><i class="fa-solid fa-pen"></i></a>
                            </div>      
                            <div class="form_ajustar">
                            <form method="POST" class="w-100" action="/noticias/eliminar">
                                <input type="hidden" name="id" value="<?php echo $noticia->id; ?>">
                                <input type="hidden" name="tipo" value="noticias">
                                <button type="submit" class="form_ajustar__btn rojo enviar" value="">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                            </div>                  
                        </div>                        
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>