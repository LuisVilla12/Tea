<!-- <h2 class="admin__titulo">Administrador de infantes</h2> -->
<div class="recuadro__admin">
    <p>Administrador de</p>
</div>
<div class="recuadro__registro">
    <p>Registros infantes</p>
</div>
<div class="busqueda contenedor">
<form action="" class="formulario">    
    <div class="campo">        
        <label for="fecha" class="campo__label">Fecha:</label>
        <input type="date" class="campo__input" id="fecha" name="fecha" value="<?php echo $fecha ?>">
    </div>
</form>
</div>
<main class="contenedor">
    <div class="space_between">
        <a href="/admin" class="btn">Volver</a>
        <!-- <a href="/noticias/crear" class="btn">Añadir noticia</a> -->
    </div>
    <table class="lista">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre infante</th>
                <th>Nombre tutor</th>
                <th>Edad</th>
                <th>Genero</th>
                <th>Hora inicio</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($citas as $cita) : ?>
                <tr>
                    <td><?php echo $infante->id ?></td>
                    <?php echo $infante->nombreInfante?></td> -->
                    <td><?php echo $infante->nombreTutor?></td>
                    <td>
                        <?php 
                            $edad= getAge($infante->fechaNacimiento);
                            echo $edad;
                        ?>
                    </td>
                    <td><?php echo $infante->genero ==='1' ? 'Hombre': 'Mujer';   ?></td>                    
                    <td>
                        <div class="dos_columnas">
                                              
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
    <script src='build/js/buscador.js'></script>
    <script src='/build/JS/AccionesCita.js'></script>
    ";
?>