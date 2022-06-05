<?php 
// debuguear($_SESSION);
?>

<main class="contenedor inicio">
    <h2 class="text-center titulo__login">Infantes registrados</h1>
    <div class="space_between">
        <a href="/inicio" class="btn_primario">Inicio</a>
        <a href="/registrar-infante" class="btn_primario">Registrar infante</a>
        <!-- <a href="/cita" class="btn_secundario">Agendar cita</a> -->
    </div>
    <?php if(count($infantes)===0):?>
        <p>No hay infantes registrados</p>
    <?php else:?>
    <table class="lista">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Genero</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($infantes as $infante) : ?>
                <tr>
                    <td><?php echo $infante->nombre ." ". $infante->apellidoPat ." ". $infante->apellidoMat?></td>
                    <td><?php echo $infante->sexo =="1"?'Hombre':'Mujer' ?></td>
                    <td>
                    <?php
                            $edad= getAge($infante->fechaNacimiento);
                            echo $edad;
                            ?>        
                </td>
                    <!-- <td>
                        <a href="/infante/actualizar?id=<?php echo $infante->id; ?>" class="btn amarillo">Actualizar</a>
                        <form method="POST" class="w-100" action="/infante/eliminar">
                            <input type="hidden" name="id" value="<?php echo $infante->id; ?>">
                            <input type="hidden" name="tipo" value="infante">
                            <input type="submit" class="btn rojo enviar" value="Eliminar">
                        </form>
                    </td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif;?>
    
</main>

