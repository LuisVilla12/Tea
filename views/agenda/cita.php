
<?php 
// debuguear($_SESSION);
$id_tutor=$_SESSION['id'];
?>
<div class="recuadro__form">
    <p>Registrate ahora</p>
</div>
<div class="">
    <main class="contenedor-max centrar-contenido">
        <form action="/cita" method="POST" class="formulario fondo_max">
            <fieldset>
            <legend>Datos del infante</legend>
            <div class="campo">
                <label class="campo__label" for="id_infante">Seleccione al infante:</label>
                <select name="id_infante" id="id_infante" class="campo__input">
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
                        <select name="id_horario" id="id_horario" class="campo__input">
                            <?php foreach($horarios as $horario):?>
                                <option value="<?php echo $horario->id?>"><?php echo $horario->horaInicio ."-". $horario->horaFin ?></option>                    
                            <?php endforeach?>
                        </select>      
                        <input type="hidden" id="id_tutor" name="id_tutor" value="<?php echo $id_tutor?>">
                    </select>
                </div>
            </div>
            </fieldset>
            <div class="space_between">
                <a href="/inicio" class="btnVolver">Volver al inicio</a>
                <input type="submit" class="btn-enviar" id="guardar" value="Registrar cita">
            </div>
        </form>
    </main>
</div>

    <?php 
        $script="
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='../build/Citas.js' ></script>
        <script src='../build/fechas.js' ></script>
        "
    ?>