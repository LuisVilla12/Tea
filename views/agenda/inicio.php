<?php 
// debuguear($citas);
?>

<main class="contenedor inicio">
    <h2 class="text-center titulo__login">Mis citas</h1>
    <div class="space_between">
        <a href="/inicio/infantes" class="btn_uno">Ver infantes</a>
        <a href="/cita" class="btn_dos">Agendar cita</a>
    </div>    
    <?php if(count($citas)===0):?>
        <p>No hay citas</p>
        <?php else:?>
            <table class="lista">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre infante</th>
                        <th>Edad</th>
                        <th>Genero</th>
                        <th>Fecha</th>
                        <th>Hora inicio</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    
            <?php foreach ($citas as $cita) : ?>
                
                <tr  class="<?php echo $cita->asistir==1? 'verde': 'nada';?>">
                    <td><?php echo $cita->id ?></td>
                    <td><?php echo $cita->nombreInfante?></td></td>
                    <td>
                        <?php
                            $edad= getAge($cita->fechaNacimiento);
                            echo $edad;
                            ?>
                    </td>
                    <td><?php echo $cita->sexo ==='1' ? 'Hombre': 'Mujer';   ?></td>
                    <td><?php echo $cita->fecha?></td>
                    <td><?php echo $cita->horaInicio?></td>
                    <td>
                        <div class="form_ajustar">
                            <form method="POST" class="posponer" action="/agenda/eliminar">
                                <input type="hidden" name="id" value="<?php echo $cita->id;?>">
                                <!-- <input type="hidden" name="tipo" value="usuario"> -->
                                <button type="submit" class="" value="" id="eliminar" data-id="<?php echo $cita->id; ?>">
                                    <i data-id="<?php echo $cita->id; ?>" class="fa-regular fa-rectangle-xmark"></i>
                                </button>
                            </form>             
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
    <script src='/build/AccionesCita.js'></script>
    ";
?>

