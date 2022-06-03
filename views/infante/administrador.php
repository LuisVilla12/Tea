<!-- <h2 class="admin__titulo">Administrador de infantes</h2> -->
<div class="recuadro__admin">
    <p>Administrador de</p>
</div>
<div class="recuadro__registro">
    <p>Registros infantes</p>
</div>
<!-- <div class="recuadro__usuario">
    <p>infante</p>
</div> -->
<main class="contenedor">
    <div class="space_between">
        <a href="/admin" class="btn">Volver</a>
        <!-- <a href="/noticias/crear" class="btn">Añadir noticia</a> -->
    </div>
    <table class="lista">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Genero</th>
                <th>Edad</th>
                <th>Tutor</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($infantes as $infante) : ?>
                <tr>
                    <td><?php echo $infante->id ?></td>
                    <!-- <td><?php echo $infante->nombre . " ". $infante->apellidoPat . " " .$infante->apellidoMat?></td> -->
                    <td><?php echo $infante->nombre?></td>
                    <td><?php echo $infante->sexo ==='1' ? 'Hombre': 'Mujer';   ?></td>
                    <td>
                        <?php 
                            $edad= getAge($infante->fechaNacimiento);
                            echo $edad;
                        ?>
                    </td>
                    <td><?php echo $infante->nombreTutor ?></td>                    
                    <td>
                        <div class="dos_columnas">
                            <div class="form_ajustar">
                                <a href="/infantes/actualizar?id=<?php echo $infante->id; ?>" class="form_ajustar__btn amarillo padding" ><i class="fa-solid fa-pen"></i></a>
                            </div>
                            <div class="form_ajustar">
                                <form method="POST" class="w-100" action="/infantes/eliminar">
                                <input type="hidden" name="id" value="<?php echo $infante->id; ?>">
                                <input type="hidden" name="tipo" value="infantes">
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