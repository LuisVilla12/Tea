<?php 
$id_tutor=$_SESSION['id'];
?>
<main class="contenedor">
    <h2 class="text-center"> Registrar cita</h2>
    <form action="/cita" method="POST" class="formulario">
        <fieldset>
        <legend>Datos del infante</legend>
        <div class="campo">
            <label class="campo__label" for="infante">Seleccione al infante:</label>
            <select name="id_infante" id="infante" class="campo__input">
                <?php foreach($infantes as $infante):?>
                    <option value="<?php echo $infante->id?>"><?php echo $infante->nombre ." ". $infante->apellidoPat . " ". $infante->apellidoMat?></option>                    
                <?php endforeach?>
            </select>
        </div>
        </fieldset>
        <fieldset>
            <legend>Datos de la cita</legend>
            <div class="dos_campos">
                <div class="campo">
                    <label class="campo__label" for="fecha">Seleccione la fecha:</label>
                    <input type="date" id="fecha" name="fecha" class="campo__input">
                </div>
                <div class="campo">
                    <label class="campo__label" for="hora">Seleccione el horario:</label>
                    <select name="id_horario" id="hora" class="campo__input">
                        <?php foreach($horarios as $horario):?>
                            <option value="<?php echo $horario->id?>"><?php echo $horario->horaInicio ."-". $horario->horaFin ?></option>                    
                        <?php endforeach?>
                    </select>      
                    <input type="hidden" id="tutor" name="id_tutor" value="<?php echo $id_tutor?>">
                </select>
            </div>
        </div>
        </fieldset>
        <div class="space_between">
            <a href="/inicio" class="btn">Volver al inicio</a>
            <input type="submit" class="btn-enviar" value="Registrar cita">
        </div>
    </form>
</main>

    <?php 
        $script="<script src='../build/fechas.js' ></script>"
    ?>