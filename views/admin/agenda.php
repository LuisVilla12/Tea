<!-- <h2 class="admin__titulo">Administrador de infantes</h2> -->
<?php
// debuguear($citas);
// exit;
?>
<div class="recuadro__admin">
    <p class="admin">Agenda</p>
</div>
<div class="space_between contenedor">
    <a href="/admin" class="btn_uno">Volver</a>
        <!-- <a href="/noticias/crear" class="btn">Añadir noticia</a> -->
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
    <?php if(count($citas)===0):?>
        <p>No hay citas</p>
        <?php else:?>
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
                    <td><?php echo $cita->id ?></td>
                    <td><?php echo $cita->nombreInfante?></td></td>
                    <td><?php echo $cita->nombreTutor?></td>
                    <td>
                        <?php
                            $edad= getAge($cita->fechaNacimiento);
                            echo $edad;
                        ?>
                    </td>
                    <td><?php echo $cita->sexo ==='1' ? 'Hombre': 'Mujer';   ?></td>
                    <td><?php echo $cita->horaInicio?></td>
                    <td>
                        <div class="dos_columnas">
                            <div class="form_ajustar">
                                <a class="padding" id="asistir" href="/agenda/asistir?id=<?php echo $cita->id;?>" ><i data-id="<?php echo $cita->id; ?>" class="fa-regular fa-square-check"></i></a>                            
                            </div>
                            <div class="form_ajustar">
                                <form method="POST" class="posponer" action="/agenda/eliminar">
                                    <input type="hidden" name="id" value="<?php echo $cita->id;?>">
                                    <!-- <input type="hidden" name="tipo" value="usuario"> -->
                                    <button type="submit" class="" value="" id="eliminar" data-id="<?php echo $cita->id; ?>">
                                        <i data-id="<?php echo $cita->id; ?>" class="fa-regular fa-rectangle-xmark"></i>
                                    </button>
                                </form>
                            </div>              
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif;?>
        </tbody>
    </table>
</main>
<?php
    $script="
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='/build/buscador.js'></script>
    <script src='/build/AccionesCita.js'></script>
    ";
?>
