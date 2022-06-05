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
                                <a class="padding" id="asistir" href="/infantes/actualizar?id=<?php echo $infante->id;?>" ><i data-id="<?php echo $infante->id; ?>" class="fa-regular fa-square-check"></i></a>                            
                            </div>
                            <div class="form_ajustar">
                                <form method="POST" class="posponer" action="/infantes/eliminar">
                                    <input type="hidden" name="id" value="<?php echo $infante->id;?>">
                                    <!-- <input type="hidden" name="tipo" value="usuario"> -->
                                    <button type="submit" class="" value="" id="eliminar" data-id="<?php echo $infante->id; ?>">
                                        <i data-id="<?php echo $infante->id; ?>" class="fa-regular fa-rectangle-xmark"></i>
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
<?php
    $script="
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='/build/EliminarInfante.js'></script>
    ";
?>